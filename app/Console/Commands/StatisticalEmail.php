<?php

namespace App\Console\Commands;

use App\Constant;
use App\Interfaces\IPostRepository;
use App\Interfaces\ISearchRepository;
use App\Interfaces\IUserRepository;
use App\Mail\StatisticalMail;
use App\Mail\WeeeklyMailCandidate;
use App\Mail\WeeklyMailCompany;
use App\Trait\Service;
use Carbon\Carbon;
use Illuminate\Console\Command;

/**
 * @property ISearchRepository $search_repo
 * @property IPostRepository $post_repo
 * @property IUserRepository $user_repo
 */
class StatisticalEmail extends Command
{
    use Service;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:statistical-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send mail once a week at 9:00 am on Monday';

    public function __construct
    (
        ISearchRepository $searchRepository,
        IPostRepository $postRepository,
        IUserRepository $userRepository
    ) {
        parent::__construct();
        $this->search_repo = $searchRepository;
        $this->post_repo = $postRepository;
        $this->user_repo = $userRepository;
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $from = Carbon::now()->startOfWeek()->subWeek()->toDateString();
        $to = Carbon::now()->endOfWeek()->subWeek()->toDateString();

        $post_not_approved = $this->search_repo->StatisticalPost(Constant::STATUS_NOT_APPROVED_POST, $from, $to);
        $post_approved = $this->search_repo->StatisticalPost(Constant::STATUS_APPROVED_POST, $from, $to);

        $users = $this->user_repo->getMajorUser(Constant::ROLE_CANDIDATE);

        $data_user = [];
        foreach ($users as $user) {
            $data_user[] = [
                'user' => $user,
                'post' => $this->post_repo->getMajorByPost(Constant::STATUS_APPROVED_POST, $user->major, $from, $to)
            ];
        }

        foreach ($data_user as $data) {
            $this->sendMailUser($data['user'], new WeeeklyMailCandidate($data['user'], $data['post']));
        }

        $company_posts = $this->post_repo->all();
        $data_company = [];
        foreach ($company_posts as $post) {
            $data_company[] = [
                'allPost' => $post,
                'user_applied' => $this->user_repo->getUserApplied($post->id)
            ];
        }

        $list_applied = array_filter($data_company, function ($data) {
            return $data['user_applied']->isNotEmpty();
        });

        $get_user = [];
        $get_company = null;
        $applied = null;

        foreach ($list_applied as $applied) {
            for ($i = 0; $i < count($applied['user_applied']); $i++) {
                $get_user[] = $this->user_repo->find($applied['user_applied'][$i]->user_id);
                $get_company = $this->user_repo->find($applied['allPost']->user_id);

            }
        }
        $this->sendMailUser($get_company, new WeeklyMailCompany($get_user, $applied['allPost']));
        $this->sendMailByRole(Constant::ROLE_ADMIN,new StatisticalMail($post_not_approved, $post_approved, $from, $to));
    }
}
