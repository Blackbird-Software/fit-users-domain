<?php declare(strict_types=1);

namespace App\Admin\UI\Command;

use App\Admin\Domain\Model\Admin;
use App\Admin\Domain\Repository\Admins;
use App\Common\Infrastructure\Generator\IdGeneratorInterface;
use App\User\Domain\Enum\LocaleEnum;
use App\User\Domain\ValueObject\CreatedAt;
use App\User\Domain\ValueObject\Email;
use App\User\Domain\ValueObject\Locale;
use App\User\Domain\ValueObject\Password;
use App\User\Domain\ValueObject\UserId;
use App\User\Infrastructure\Security\Hasher\PasswordHasherInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Console\Style\SymfonyStyle;

final class AddAdminCommand extends Command
{
    /** @var string */
    protected static $defaultName = 'app:admin:create';

    private IdGeneratorInterface $generator;

    private PasswordHasherInterface $passwordHasher;

    private Admins $admins;

    public function __construct(IdGeneratorInterface $generator, PasswordHasherInterface $passwordHasher, Admins $admins)
    {
        $this->generator = $generator;
        $this->passwordHasher = $passwordHasher;
        $this->admins = $admins;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription('Creates a new admin')
            ->setHelp('This command allows you to create a new admin. E-mail address, password and locale are required. ');
    }

    /**
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): void
    {
        // @TODO add validation
        $helper = $this->getHelper('question');
        $emailQuestion = new Question('Please enter your e-mail address: ');
        $email = $helper->ask($input, $output, $emailQuestion);

        $passwordQuestion = new Question('Please enter your password: ');
        $passwordQuestion->setHidden(true);
        $passwordQuestion->setHiddenFallback(false);
        $passwordQuestion->setMaxAttempts(2);
        $password = $helper->ask($input, $output, $passwordQuestion);

        $localeQuestion = new ChoiceQuestion(
            'Please select your language (defaults to English)',
            LocaleEnum::getNames(),
            0
        );
        $localeQuestion->setErrorMessage('Language %s is invalid.');
        $locale = $helper->ask($input, $output, $localeQuestion);

        $admin = Admin::create(
            new UserId($this->generator->generate()),
            new Email($email),
            new Password(($this->passwordHasher)($password)),
            new CreatedAt(new \DateTimeImmutable()),
            new Locale(LocaleEnum::byName($locale)->getValue())
        );

        $this->admins->add($admin);

        $io = new SymfonyStyle($input, $output);
        $io->success(
            sprintf(
                'Successfully created admin account for given e-mail address: %s.',
                $email,
            )
        );
    }
}