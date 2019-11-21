<?php declare(strict_types=1);

namespace App\Admin\UI\Command;

use App\Admin\Domain\Model\AdminInterface;
use App\Admin\Domain\Repository\Admins;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\ValueObject\UserId;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

final class GetAdminCommand extends Command
{
    /** @var string */
    protected static $defaultName = 'app:admin:get';

    private IdGeneratorInterface $generator;

    private Admins $admins;

    public function __construct(IdGeneratorInterface $generator, Admins $admins)
    {
        $this->generator = $generator;
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
        // @TODO add validation
        $helper = $this->getHelper('question');
        $question = new Question('Please enter id: ');
        $answer = $helper->ask($input, $output, $question);

        $id = $this->generator->generateFromString($answer);

        /** @var AdminInterface $admin */
        $admin = $this->admins->find(new UserId($id));

        $table = new Table($output);
        $table
            ->setHeaders(['ID', 'E-mail', 'Locale', 'CreatedAt', 'UpdatedAt'])
            ->setRows([
                [
                    $admin->id(),
                    $admin->email(),
                    $admin->locale(),
                    $admin->createdAt(),
                    $admin->updatedAt()
                ]
            ]);
        $table->render();
    }
}