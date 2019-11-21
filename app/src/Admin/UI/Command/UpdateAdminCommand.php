<?php declare(strict_types=1);

namespace App\Admin\UI\Command;

use App\Admin\Domain\Model\Admin;
use App\Admin\Domain\Repository\Admins;
use App\Shared\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\Enum\LocaleEnum;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UpdatedAt;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\Security\Hasher\PasswordHasherInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

final class UpdateAdminCommand extends Command
{
    /** @var string */
    protected static $defaultName = 'app:admin:update';

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
            ->setDescription('Updates given admin account')
            ->setHelp('This command allows you to update given admin account. Id and locale are required. ');
    }

    /**
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        // @TODO add validation
        $helper = $this->getHelper('question');
        $idQuestion = new Question('Please enter id: ');
        $idAnswer = $helper->ask($input, $output, $idQuestion);

        $localeQuestion = new ChoiceQuestion(
            'Please select your language (defaults to English)',
            LocaleEnum::getNames(),
            0
        );
        $localeQuestion->setErrorMessage('Language %s is invalid.');
        $locale = $helper->ask($input, $output, $localeQuestion);

        $id = $this->generator->generateFromString($idAnswer);
        $admin = $this->admins->find(new UserId($id));
        $admin->update(
            new UpdatedAt(new \DateTimeImmutable()),
            new Locale(LocaleEnum::byName($locale)->getValue())
        );
        $this->admins->update($admin);

        $io = new SymfonyStyle($input, $output);
        $io->success(
            sprintf(
                'Successfully updated admin account for given id: %s with locale %s.',
                $id,
                $locale
            )
        );
    }
}