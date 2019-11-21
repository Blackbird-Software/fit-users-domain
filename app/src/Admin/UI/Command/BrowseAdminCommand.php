<?php declare(strict_types=1);

namespace App\Admin\UI\Command;

use App\Admin\Domain\Model\AdminInterface;
use App\Admin\Domain\Repository\Admins;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class BrowseAdminCommand extends Command
{
    /** @var string */
    protected static $defaultName = 'app:admin:browse';

    private Admins $admins;

    public function __construct(Admins $admins)
    {
        $this->admins = $admins;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Fetches an admin by given id')
            ->setHelp('This command allows you to fetch an admin by given id. Id is required. ');
    }

    /**
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        $adminViews = [];
        $admins = $this->admins->findAll();

        /** @var AdminInterface $admin */
        foreach ($admins as $admin) {
            $adminViews[] = [
                $admin->id(),
                $admin->email(),
                $admin->locale(),
                $admin->createdAt(),
                $admin->updatedAt()
            ];
        }

        $table = new Table($output);
        $table
            ->setHeaders(['ID', 'E-mail', 'Locale', 'CreatedAt', 'UpdatedAt'])
            ->setRows($adminViews);

        $table->render();
    }
}