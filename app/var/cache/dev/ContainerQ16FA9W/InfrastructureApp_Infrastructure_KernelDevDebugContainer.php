<?php

namespace ContainerQ16FA9W;

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class InfrastructureApp_Infrastructure_KernelDevDebugContainer extends Container
{
    private $buildParameters;
    private $containerDir;
    private $parameters = [];
    private $targetDirs = [];
    private $getService;

    public function __construct(array $buildParameters = [], $containerDir = __DIR__)
    {
        $this->getService = \Closure::fromCallable([$this, 'getService']);
        $dir = $this->targetDirs[0] = \dirname($containerDir);
        for ($i = 1; $i <= 4; ++$i) {
            $this->targetDirs[$i] = $dir = \dirname($dir);
        }
        $this->buildParameters = $buildParameters;
        $this->containerDir = $containerDir;
        $this->parameters = $this->getDefaultParameters();

        $this->services = $this->privates = [];
        $this->syntheticIds = [
            'kernel' => true,
        ];
        $this->methodMap = [
            'cache.app' => 'getCache_AppService',
            'cache.system' => 'getCache_SystemService',
            'event_dispatcher' => 'getEventDispatcherService',
            'http_kernel' => 'getHttpKernelService',
            'profiler' => 'getProfilerService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'translator' => 'getTranslatorService',
            'twig' => 'getTwigService',
            'validator' => 'getValidatorService',
        ];
        $this->fileMap = [
            'App\\Infrastructure\\Controller\\Action\\GetAction' => 'getGetActionService.php',
            'App\\Infrastructure\\Controller\\Action\\RegisterAction' => 'getRegisterActionService.php',
            'App\\Infrastructure\\Controller\\Action\\RemoveAction' => 'getRemoveActionService.php',
            'App\\Infrastructure\\Controller\\ArgumentResolver\\RequestDTOResolver' => 'getRequestDTOResolverService.php',
            'App\\Infrastructure\\Repository\\UsersInMemoryRepository' => 'getUsersInMemoryRepositoryService.php',
            'App\\Infrastructure\\Repository\\UsersRedisRepository' => 'getUsersRedisRepositoryService.php',
            'App\\Infrastructure\\Security\\Hasher\\BcryptPasswordHasher' => 'getBcryptPasswordHasherService.php',
            'App\\Infrastructure\\Security\\Hasher\\Md5PasswordHasher' => 'getMd5PasswordHasherService.php',
            'App\\Infrastructure\\Service\\Factory\\UsersFactory' => 'getUsersFactoryService.php',
            'App\\Infrastructure\\Service\\Generator\\RandomIntegerIdGenerator' => 'getRandomIntegerIdGeneratorService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController' => 'getRedirectControllerService.php',
            'Symfony\\Bundle\\FrameworkBundle\\Controller\\TemplateController' => 'getTemplateControllerService.php',
            'cache.app_clearer' => 'getCache_AppClearerService.php',
            'cache.global_clearer' => 'getCache_GlobalClearerService.php',
            'cache.system_clearer' => 'getCache_SystemClearerService.php',
            'cache_clearer' => 'getCacheClearerService.php',
            'cache_warmer' => 'getCacheWarmerService.php',
            'console.command_loader' => 'getConsole_CommandLoaderService.php',
            'filesystem' => 'getFilesystemService.php',
            'fos_rest.serializer.jms_handler_registry' => 'getFosRest_Serializer_JmsHandlerRegistryService.php',
            'fos_rest.view_handler' => 'getFosRest_ViewHandlerService.php',
            'jms_serializer' => 'getJmsSerializerService.php',
            'jms_serializer.deserialization_context_factory' => 'getJmsSerializer_DeserializationContextFactoryService.php',
            'jms_serializer.handler_registry' => 'getJmsSerializer_HandlerRegistryService.php',
            'jms_serializer.metadata_driver' => 'getJmsSerializer_MetadataDriverService.php',
            'jms_serializer.serialization_context_factory' => 'getJmsSerializer_SerializationContextFactoryService.php',
            'jms_serializer.twig_extension.serializer_runtime_helper' => 'getJmsSerializer_TwigExtension_SerializerRuntimeHelperService.php',
            'routing.loader' => 'getRouting_LoaderService.php',
            'services_resetter' => 'getServicesResetterService.php',
            'session' => 'getSessionService.php',
            'twig.controller.exception' => 'getTwig_Controller_ExceptionService.php',
            'twig.controller.preview_error' => 'getTwig_Controller_PreviewErrorService.php',
            'web_profiler.controller.exception' => 'getWebProfiler_Controller_ExceptionService.php',
            'web_profiler.controller.profiler' => 'getWebProfiler_Controller_ProfilerService.php',
            'web_profiler.controller.router' => 'getWebProfiler_Controller_RouterService.php',
        ];

        $this->aliases = [];

        $this->privates['service_container'] = function () {
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerNameParser.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher/EventSubscriberInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/ResponseListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/StreamedResponseListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/LocaleListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/ValidateRequestListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/EventListener/ResolveControllerNameSubscriber.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/DisallowRobotsIndexingListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/HttpKernelInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/TerminableInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/HttpKernel.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ControllerResolverInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/TraceableControllerResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ControllerResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ContainerControllerResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Controller/ControllerResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ArgumentResolverInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/TraceableArgumentResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Controller/ArgumentResolver.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/ControllerMetadata/ArgumentMetadataFactoryInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/ControllerMetadata/ArgumentMetadataFactory.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-foundation/RequestStack.php';
            include_once $this->targetDirs[3].'/vendor/symfony/config/ConfigCacheFactoryInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/config/ResourceCheckerConfigCacheFactory.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/LocaleAwareListener.php';
            include_once $this->targetDirs[3].'/vendor/psr/cache/src/CacheItemPoolInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Adapter/AdapterInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache-contracts/CacheInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/PruneableInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/ResettableInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Adapter/TraceableAdapter.php';
            include_once $this->targetDirs[3].'/vendor/psr/log/Psr/Log/LoggerAwareInterface.php';
            include_once $this->targetDirs[3].'/vendor/psr/log/Psr/Log/LoggerAwareTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Traits/AbstractTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Traits/AbstractAdapterTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache-contracts/CacheTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Traits/ContractsTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Adapter/AbstractAdapter.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Traits/FilesystemCommonTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Traits/FilesystemTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Adapter/FilesystemAdapter.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Marshaller/MarshallerInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/Marshaller/DefaultMarshaller.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/AbstractSessionListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/SessionListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/service-contracts/ServiceProviderInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/service-contracts/ServiceLocatorTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ServiceLocator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/Validation.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/ConstraintValidatorFactoryInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/ContainerConstraintValidatorFactory.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation-contracts/LocaleAwareInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/TranslatorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation-contracts/TranslatorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/Util/LegacyTranslatorProxy.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/TranslatorBagInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/Translator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/CacheWarmer/WarmableInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Translation/Translator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/Formatter/MessageFormatterInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/Formatter/IntlFormatterInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/Formatter/ChoiceMessageFormatterInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/Formatter/MessageFormatter.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation-contracts/TranslatorTrait.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/IdentityTranslator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Profiler/Profiler.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Profiler/ProfilerStorageInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Profiler/FileProfilerStorage.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/DataCollectorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/DataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/LateDataCollectorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/TimeDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/MemoryDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/DataCollector/ValidatorDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/AjaxDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/ExceptionDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/LoggerDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/EventDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/cache/DataCollector/CacheDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/DataCollector/TranslationDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/DataCollector/TwigDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/snc/redis-bundle/DataCollector/RedisDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/ConfigDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/ProfilerListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/RequestDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/DataCollector/RouterDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/DataCollector/RouterDataCollector.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/DebugHandlersListener.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Debug/FileLinkFormatter.php';
            include_once $this->targetDirs[3].'/vendor/symfony/stopwatch/Stopwatch.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/RequestContext.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/EventListener/RouterListener.php';
            include_once $this->targetDirs[3].'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/Reader.php';
            include_once $this->targetDirs[3].'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationReader.php';
            include_once $this->targetDirs[3].'/vendor/doctrine/annotations/lib/Doctrine/Common/Annotations/AnnotationRegistry.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Environment.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/LoaderInterface.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/ExistsLoaderInterface.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/SourceContextLoaderInterface.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Loader/FilesystemLoader.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bundle/Loader/NativeFilesystemLoader.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/ExtensionInterface.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/AbstractExtension.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/ProfilerExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/ProfilerExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/TranslationExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/CodeExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/RoutingExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/YamlExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/StopwatchExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/HttpKernelExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/Extension/HttpFoundationExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-foundation/UrlHelper.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Extension/DebugExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Twig/WebProfilerExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/var-dumper/Dumper/DataDumperInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/var-dumper/Cloner/DumperInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/var-dumper/Dumper/AbstractDumper.php';
            include_once $this->targetDirs[3].'/vendor/symfony/var-dumper/Dumper/CliDumper.php';
            include_once $this->targetDirs[3].'/vendor/symfony/var-dumper/Dumper/HtmlDumper.php';
            include_once $this->targetDirs[3].'/vendor/jms/serializer/src/Twig/SerializerRuntimeExtension.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bridge/AppVariable.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/RuntimeLoader/RuntimeLoaderInterface.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/RuntimeLoader/ContainerRuntimeLoader.php';
            include_once $this->targetDirs[3].'/vendor/symfony/twig-bundle/DependencyInjection/Configurator/EnvironmentConfigurator.php';
            include_once $this->targetDirs[3].'/vendor/twig/twig/src/Profiler/Profile.php';
            include_once $this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Csp/ContentSecurityPolicyHandler.php';
            include_once $this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Csp/NonceGenerator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/EventListener/WebDebugToolbarListener.php';
            include_once $this->targetDirs[3].'/vendor/snc/redis-bundle/Logger/RedisLogger.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Request/ParamReaderInterface.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Request/ParamReader.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/EventListener/BodyListener.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Decoder/DecoderProviderInterface.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Decoder/ContainerDecoderProvider.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/EventListener/ParamFetcherListener.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Request/ParamFetcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Util/ResolverTrait.php';
            include_once $this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Request/ParamFetcher.php';
            include_once $this->targetDirs[3].'/vendor/psr/log/Psr/Log/LoggerInterface.php';
            include_once $this->targetDirs[3].'/vendor/psr/log/Psr/Log/AbstractLogger.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Log/Logger.php';
            include_once $this->targetDirs[3].'/vendor/symfony/translation/DataCollectorTranslator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/RequestContextAwareInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/Matcher/UrlMatcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/Generator/UrlGeneratorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/RouterInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/Matcher/RequestMatcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/routing/Router.php';
            include_once $this->targetDirs[3].'/vendor/symfony/service-contracts/ServiceSubscriberInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ServiceSubscriberInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/framework-bundle/Routing/Router.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ParameterBag/ParameterBagInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ParameterBag/ParameterBag.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ParameterBag/FrozenParameterBag.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ParameterBag/ContainerBagInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/dependency-injection/ParameterBag/ContainerBag.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/Mapping/Factory/MetadataFactoryInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/Validator/ValidatorInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/validator/Validator/TraceableValidator.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher-contracts/EventDispatcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher/EventDispatcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher/Debug/TraceableEventDispatcherInterface.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher/Debug/TraceableEventDispatcher.php';
            include_once $this->targetDirs[3].'/vendor/symfony/http-kernel/Debug/TraceableEventDispatcher.php';
            include_once $this->targetDirs[3].'/vendor/symfony/event-dispatcher/EventDispatcher.php';
        };
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function getRemovedIds()
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.'removed-ids.php';
    }

    protected function load($file, $lazyLoad = true)
    {
        return require $this->containerDir.\DIRECTORY_SEPARATOR.$file;
    }

    /**
     * Gets the public 'cache.app' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AppService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('XCL5O315F5', 0, ($this->targetDirs[0].'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));
        $a->setLogger(($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));

        return $this->services['cache.app'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the public 'cache.system' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SystemService()
    {
        return $this->services['cache.system'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('grVsBZd8aR', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))));
    }

    /**
     * Gets the public 'event_dispatcher' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher
     */
    protected function getEventDispatcherService()
    {
        $this->services['event_dispatcher'] = $instance = new \Symfony\Component\HttpKernel\Debug\TraceableEventDispatcher(new \Symfony\Component\EventDispatcher\EventDispatcher(), ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true))), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));

        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['fos_rest.body_listener'] ?? $this->getFosRest_BodyListenerService());
        }, 1 => 'onKernelRequest'], 10);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['fos_rest.param_fetcher_listener'] ?? $this->getFosRest_ParamFetcherListenerService());
        }, 1 => 'onKernelController'], 5);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['response_listener'] ?? ($this->privates['response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8')));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['streamed_response_listener'] ?? ($this->privates['streamed_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\StreamedResponseListener()));
        }, 1 => 'onKernelResponse'], -1024);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'setDefaultLocale'], 100);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelRequest'], 16);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_listener'] ?? $this->getLocaleListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['validate_request_listener'] ?? ($this->privates['validate_request_listener'] = new \Symfony\Component\HttpKernel\EventListener\ValidateRequestListener()));
        }, 1 => 'onKernelRequest'], 256);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['resolve_controller_name_subscriber'] ?? $this->getResolveControllerNameSubscriberService());
        }, 1 => 'onKernelRequest'], 24);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['disallow_search_engine_index_response_listener'] ?? ($this->privates['disallow_search_engine_index_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\DisallowRobotsIndexingListener()));
        }, 1 => 'onResponse'], -255);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelRequest'], 15);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['locale_aware_listener'] ?? $this->getLocaleAwareListenerService());
        }, 1 => 'onKernelFinishRequest'], -15);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleError'], -128);
        $instance->addListener('console.terminate', [0 => function () {
            return ($this->privates['console.error_listener'] ?? $this->load('getConsole_ErrorListenerService.php'));
        }, 1 => 'onConsoleTerminate'], -128);
        $instance->addListener('console.error', [0 => function () {
            return ($this->privates['console.suggest_missing_package_subscriber'] ?? ($this->privates['console.suggest_missing_package_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\SuggestMissingPackageSubscriber()));
        }, 1 => 'onConsoleError'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelRequest'], 128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onKernelResponse'], -1000);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['session_listener'] ?? $this->getSessionListenerService());
        }, 1 => 'onFinishRequest'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelResponse'], -100);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelException'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ($this->privates['profiler_listener'] ?? $this->getProfilerListenerService());
        }, 1 => 'onKernelTerminate'], -1024);
        $instance->addListener('kernel.controller', [0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelController'], 0);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector()));
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('console.command', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'configure'], 2048);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['debug.debug_handlers_listener'] ?? $this->getDebug_DebugHandlersListenerService());
        }, 1 => 'onKernelException'], -2048);
        $instance->addListener('kernel.request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['router_listener'] ?? $this->getRouterListenerService());
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'logKernelException'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ($this->privates['twig.exception_listener'] ?? $this->load('getTwig_ExceptionListenerService.php'));
        }, 1 => 'onKernelException'], -128);
        $instance->addListener('kernel.response', [0 => function () {
            return ($this->privates['web_profiler.debug_toolbar'] ?? $this->getWebProfiler_DebugToolbarService());
        }, 1 => 'onKernelResponse'], -128);

        return $instance;
    }

    /**
     * Gets the public 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        $a = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));

        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), new \Symfony\Component\HttpKernel\Controller\TraceableControllerResolver(new \Symfony\Bundle\FrameworkBundle\Controller\ControllerResolver($this, ($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))), $a), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), new \Symfony\Component\HttpKernel\Controller\TraceableArgumentResolver(new \Symfony\Component\HttpKernel\Controller\ArgumentResolver(new \Symfony\Component\HttpKernel\ControllerMetadata\ArgumentMetadataFactory(), new RewindableGenerator(function () {
            yield 0 => ($this->privates['debug.argument_resolver.request_attribute'] ?? $this->load('getDebug_ArgumentResolver_RequestAttributeService.php'));
            yield 1 => ($this->services['App\\Infrastructure\\Controller\\ArgumentResolver\\RequestDTOResolver'] ?? $this->load('getRequestDTOResolverService.php'));
            yield 2 => ($this->privates['debug.argument_resolver.request'] ?? $this->load('getDebug_ArgumentResolver_RequestService.php'));
            yield 3 => ($this->privates['debug.argument_resolver.session'] ?? $this->load('getDebug_ArgumentResolver_SessionService.php'));
            yield 4 => ($this->privates['debug.argument_resolver.service'] ?? $this->load('getDebug_ArgumentResolver_ServiceService.php'));
            yield 5 => ($this->privates['debug.argument_resolver.default'] ?? $this->load('getDebug_ArgumentResolver_DefaultService.php'));
            yield 6 => ($this->privates['debug.argument_resolver.variadic'] ?? $this->load('getDebug_ArgumentResolver_VariadicService.php'));
            yield 7 => ($this->privates['debug.argument_resolver.not_tagged_controller'] ?? $this->load('getDebug_ArgumentResolver_NotTaggedControllerService.php'));
        }, 8)), $a));
    }

    /**
     * Gets the public 'profiler' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Profiler\Profiler
     */
    protected function getProfilerService()
    {
        $a = ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()));

        $this->services['profiler'] = $instance = new \Symfony\Component\HttpKernel\Profiler\Profiler(new \Symfony\Component\HttpKernel\Profiler\FileProfilerStorage(('file:'.$this->targetDirs[0].'/profiler')), $a, true);

        $b = ($this->services['kernel'] ?? $this->get('kernel'));
        $c = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $d = new \Symfony\Component\Cache\DataCollector\CacheDataCollector();
        $d->addInstance('cache.app', ($this->services['cache.app'] ?? $this->getCache_AppService()));
        $d->addInstance('cache.system', ($this->services['cache.system'] ?? $this->getCache_SystemService()));
        $d->addInstance('cache.validator', ($this->privates['cache.validator'] ?? $this->getCache_ValidatorService()));
        $d->addInstance('cache.serializer', ($this->privates['cache.serializer'] ?? $this->getCache_SerializerService()));
        $d->addInstance('cache.annotations', ($this->privates['cache.annotations'] ?? $this->getCache_AnnotationsService()));
        $d->addInstance('cache.property_info', ($this->privates['cache.property_info'] ?? $this->getCache_PropertyInfoService()));
        $d->addInstance('cache.messenger.restart_workers_signal', ($this->privates['cache.messenger.restart_workers_signal'] ?? $this->getCache_Messenger_RestartWorkersSignalService()));
        $e = new \Symfony\Component\HttpKernel\DataCollector\ConfigDataCollector();
        if ($this->has('kernel')) {
            $e->setKernel($b);
        }

        $instance->add(($this->privates['data_collector.request'] ?? ($this->privates['data_collector.request'] = new \Symfony\Component\HttpKernel\DataCollector\RequestDataCollector())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\TimeDataCollector($b, ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)))));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\MemoryDataCollector());
        $instance->add(new \Symfony\Component\Validator\DataCollector\ValidatorDataCollector(($this->services['validator'] ?? $this->getValidatorService())));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\ExceptionDataCollector());
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\LoggerDataCollector($a, ($this->targetDirs[0].'/InfrastructureApp_Infrastructure_KernelDevDebugContainer'), $c));
        $instance->add(new \Symfony\Component\HttpKernel\DataCollector\EventDataCollector(($this->services['event_dispatcher'] ?? $this->getEventDispatcherService()), $c));
        $instance->add(($this->privates['data_collector.router'] ?? ($this->privates['data_collector.router'] = new \Symfony\Bundle\FrameworkBundle\DataCollector\RouterDataCollector())));
        $instance->add($d);
        $instance->add(new \Symfony\Component\Translation\DataCollector\TranslationDataCollector(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->add(new \Symfony\Bridge\Twig\DataCollector\TwigDataCollector(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), ($this->services['twig'] ?? $this->getTwigService())));
        $instance->add(new \Snc\RedisBundle\DataCollector\RedisDataCollector(($this->privates['snc_redis.logger'] ?? $this->getSncRedis_LoggerService())));
        $instance->add($e);

        return $instance;
    }

    /**
     * Gets the public 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the public 'router' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Routing\Router
     */
    protected function getRouterService()
    {
        $this->services['router'] = $instance = new \Symfony\Bundle\FrameworkBundle\Routing\Router((new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'routing.loader' => ['services', 'routing.loader', 'getRouting_LoaderService.php', true],
        ], [
            'routing.loader' => 'Symfony\\Component\\Config\\Loader\\LoaderInterface',
        ]))->withContext('router.default', $this), 'kernel::loadRoutes', ['cache_dir' => $this->targetDirs[0], 'debug' => true, 'generator_class' => 'Symfony\\Component\\Routing\\Generator\\CompiledUrlGenerator', 'generator_dumper_class' => 'Symfony\\Component\\Routing\\Generator\\Dumper\\CompiledUrlGeneratorDumper', 'matcher_class' => 'Symfony\\Bundle\\FrameworkBundle\\Routing\\RedirectableCompiledUrlMatcher', 'matcher_dumper_class' => 'Symfony\\Component\\Routing\\Matcher\\Dumper\\CompiledUrlMatcherDumper', 'strict_requirements' => true, 'resource_type' => 'service'], ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), new \Symfony\Component\DependencyInjection\ParameterBag\ContainerBag($this), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), 'en');

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));

        return $instance;
    }

    /**
     * Gets the public 'translator' shared service.
     *
     * @return \Symfony\Component\Translation\DataCollectorTranslator
     */
    protected function getTranslatorService()
    {
        return $this->services['translator'] = new \Symfony\Component\Translation\DataCollectorTranslator(($this->privates['translator.default'] ?? $this->getTranslator_DefaultService()));
    }

    /**
     * Gets the public 'twig' shared service.
     *
     * @return \Twig\Environment
     */
    protected function getTwigService()
    {
        $a = new \Symfony\Bundle\TwigBundle\Loader\NativeFilesystemLoader([], $this->targetDirs[3]);
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/framework-bundle/Resources/views'), 'Framework');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/framework-bundle/Resources/views'), '!Framework');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/twig-bundle/Resources/views'), 'Twig');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/twig-bundle/Resources/views'), '!Twig');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Resources/views'), 'WebProfiler');
        $a->addPath(($this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Resources/views'), '!WebProfiler');
        $a->addPath(($this->targetDirs[3].'/vendor/snc/redis-bundle/Resources/views'), 'SncRedis');
        $a->addPath(($this->targetDirs[3].'/vendor/snc/redis-bundle/Resources/views'), '!SncRedis');
        $a->addPath(($this->targetDirs[3].'/templates'));

        $this->services['twig'] = $instance = new \Twig\Environment($a, ['debug' => true, 'strict_variables' => true, 'autoescape' => 'name', 'cache' => ($this->targetDirs[0].'/twig'), 'charset' => 'UTF-8']);

        $b = ($this->privates['debug.stopwatch'] ?? ($this->privates['debug.stopwatch'] = new \Symfony\Component\Stopwatch\Stopwatch(true)));
        $c = ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService());
        $d = ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack()));
        $e = new \Symfony\Component\VarDumper\Dumper\HtmlDumper(NULL, 'UTF-8', 1);
        $e->setDisplayOptions(['maxStringLength' => 4096, 'fileLinkFormat' => $c]);
        $f = new \Symfony\Bridge\Twig\AppVariable();
        $f->setEnvironment('dev');
        $f->setDebug(true);
        if ($this->has('request_stack')) {
            $f->setRequestStack($d);
        }

        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\ProfilerExtension(($this->privates['twig.profile'] ?? ($this->privates['twig.profile'] = new \Twig\Profiler\Profile())), $b));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\TranslationExtension(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\CodeExtension($c, $this->targetDirs[3], 'UTF-8'));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\RoutingExtension(($this->services['router'] ?? $this->getRouterService())));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\YamlExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\StopwatchExtension($b, true));
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpKernelExtension());
        $instance->addExtension(new \Symfony\Bridge\Twig\Extension\HttpFoundationExtension(new \Symfony\Component\HttpFoundation\UrlHelper($d, ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()))));
        $instance->addExtension(new \Twig\Extension\DebugExtension());
        $instance->addExtension(new \Symfony\Bundle\WebProfilerBundle\Twig\WebProfilerExtension($e));
        $instance->addExtension(new \JMS\Serializer\Twig\SerializerRuntimeExtension());
        $instance->addGlobal('app', $f);
        $instance->addRuntimeLoader(new \Twig\RuntimeLoader\ContainerRuntimeLoader(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'JMS\\Serializer\\Twig\\SerializerRuntimeHelper' => ['services', 'jms_serializer.twig_extension.serializer_runtime_helper', 'getJmsSerializer_TwigExtension_SerializerRuntimeHelperService.php', true],
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => ['privates', 'twig.runtime.httpkernel', 'getTwig_Runtime_HttpkernelService.php', true],
        ], [
            'JMS\\Serializer\\Twig\\SerializerRuntimeHelper' => '?',
            'Symfony\\Bridge\\Twig\\Extension\\HttpKernelRuntime' => '?',
        ])));
        (new \Symfony\Bundle\TwigBundle\DependencyInjection\Configurator\EnvironmentConfigurator('F j, Y H:i', '%d days', NULL, 0, '.', ','))->configure($instance);

        return $instance;
    }

    /**
     * Gets the public 'validator' shared service.
     *
     * @return \Symfony\Component\Validator\Validator\TraceableValidator
     */
    protected function getValidatorService()
    {
        return $this->services['validator'] = new \Symfony\Component\Validator\Validator\TraceableValidator(($this->privates['validator.builder'] ?? $this->getValidator_BuilderService())->getValidator());
    }

    /**
     * Gets the private 'annotations.reader' shared service.
     *
     * @return \Doctrine\Common\Annotations\AnnotationReader
     */
    protected function getAnnotations_ReaderService()
    {
        $this->privates['annotations.reader'] = $instance = new \Doctrine\Common\Annotations\AnnotationReader();

        $a = new \Doctrine\Common\Annotations\AnnotationRegistry();
        $a->registerUniqueLoader('class_exists');

        $instance->addGlobalIgnoredName('required', $a);

        return $instance;
    }

    /**
     * Gets the private 'cache.annotations' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_AnnotationsService()
    {
        return $this->privates['cache.annotations'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('jhXQHyx+SC', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))));
    }

    /**
     * Gets the private 'cache.messenger.restart_workers_signal' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_Messenger_RestartWorkersSignalService()
    {
        $a = new \Symfony\Component\Cache\Adapter\FilesystemAdapter('80FgMY8bQL', 0, ($this->targetDirs[0].'/pools'), ($this->privates['cache.default_marshaller'] ?? ($this->privates['cache.default_marshaller'] = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller(NULL))));
        $a->setLogger(($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));

        return $this->privates['cache.messenger.restart_workers_signal'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter($a);
    }

    /**
     * Gets the private 'cache.property_info' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_PropertyInfoService()
    {
        return $this->privates['cache.property_info'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('d6hKfMRTGz', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))));
    }

    /**
     * Gets the private 'cache.serializer' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_SerializerService()
    {
        return $this->privates['cache.serializer'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('eqbJo9-FJI', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))));
    }

    /**
     * Gets the private 'cache.validator' shared service.
     *
     * @return \Symfony\Component\Cache\Adapter\TraceableAdapter
     */
    protected function getCache_ValidatorService()
    {
        return $this->privates['cache.validator'] = new \Symfony\Component\Cache\Adapter\TraceableAdapter(\Symfony\Component\Cache\Adapter\AbstractAdapter::createSystemCache('QUDCOD3OYP', 0, $this->getParameter('container.build_id'), ($this->targetDirs[0].'/pools'), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger()))));
    }

    /**
     * Gets the private 'config_cache_factory' shared service.
     *
     * @return \Symfony\Component\Config\ResourceCheckerConfigCacheFactory
     */
    protected function getConfigCacheFactoryService()
    {
        return $this->privates['config_cache_factory'] = new \Symfony\Component\Config\ResourceCheckerConfigCacheFactory(new RewindableGenerator(function () {
            yield 0 => ($this->privates['dependency_injection.config.container_parameters_resource_checker'] ?? ($this->privates['dependency_injection.config.container_parameters_resource_checker'] = new \Symfony\Component\DependencyInjection\Config\ContainerParametersResourceChecker($this)));
            yield 1 => ($this->privates['config.resource.self_checking_resource_checker'] ?? ($this->privates['config.resource.self_checking_resource_checker'] = new \Symfony\Component\Config\Resource\SelfCheckingResourceChecker()));
        }, 2));
    }

    /**
     * Gets the private 'debug.debug_handlers_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener
     */
    protected function getDebug_DebugHandlersListenerService()
    {
        return $this->privates['debug.debug_handlers_listener'] = new \Symfony\Component\HttpKernel\EventListener\DebugHandlersListener(NULL, ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), NULL, -1, true, ($this->privates['debug.file_link_formatter'] ?? $this->getDebug_FileLinkFormatterService()), true, 'UTF-8');
    }

    /**
     * Gets the private 'debug.file_link_formatter' shared service.
     *
     * @return \Symfony\Component\HttpKernel\Debug\FileLinkFormatter
     */
    protected function getDebug_FileLinkFormatterService()
    {
        return $this->privates['debug.file_link_formatter'] = new \Symfony\Component\HttpKernel\Debug\FileLinkFormatter(NULL, ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), $this->targetDirs[3], function () {
            return ($this->privates['debug.file_link_formatter.url_format'] ?? $this->load('getDebug_FileLinkFormatter_UrlFormatService.php'));
        });
    }

    /**
     * Gets the private 'fos_rest.body_listener' shared service.
     *
     * @return \FOS\RestBundle\EventListener\BodyListener
     */
    protected function getFosRest_BodyListenerService()
    {
        $this->privates['fos_rest.body_listener'] = $instance = new \FOS\RestBundle\EventListener\BodyListener(new \FOS\RestBundle\Decoder\ContainerDecoderProvider(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'fos_rest.decoder.json' => ['privates', 'fos_rest.decoder.json', 'getFosRest_Decoder_JsonService.php', true],
        ], [
            'fos_rest.decoder.json' => '?',
        ]), ['json' => 'fos_rest.decoder.json']), false);

        $instance->setDefaultFormat(NULL);

        return $instance;
    }

    /**
     * Gets the private 'fos_rest.param_fetcher_listener' shared service.
     *
     * @return \FOS\RestBundle\EventListener\ParamFetcherListener
     */
    protected function getFosRest_ParamFetcherListenerService()
    {
        return $this->privates['fos_rest.param_fetcher_listener'] = new \FOS\RestBundle\EventListener\ParamFetcherListener(new \FOS\RestBundle\Request\ParamFetcher($this, ($this->privates['fos_rest.request.param_fetcher.reader'] ?? $this->getFosRest_Request_ParamFetcher_ReaderService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->services['validator'] ?? $this->getValidatorService())), false);
    }

    /**
     * Gets the private 'fos_rest.request.param_fetcher.reader' shared service.
     *
     * @return \FOS\RestBundle\Request\ParamReader
     */
    protected function getFosRest_Request_ParamFetcher_ReaderService()
    {
        return $this->privates['fos_rest.request.param_fetcher.reader'] = new \FOS\RestBundle\Request\ParamReader(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()));
    }

    /**
     * Gets the private 'locale_aware_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener
     */
    protected function getLocaleAwareListenerService()
    {
        return $this->privates['locale_aware_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleAwareListener(new RewindableGenerator(function () {
            yield 0 => ($this->privates['translator.default'] ?? $this->getTranslator_DefaultService());
        }, 1), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())));
    }

    /**
     * Gets the private 'locale_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\LocaleListener
     */
    protected function getLocaleListenerService()
    {
        return $this->privates['locale_listener'] = new \Symfony\Component\HttpKernel\EventListener\LocaleListener(($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), 'en', ($this->services['router'] ?? $this->getRouterService()));
    }

    /**
     * Gets the private 'profiler_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ProfilerListener
     */
    protected function getProfilerListenerService()
    {
        return $this->privates['profiler_listener'] = new \Symfony\Component\HttpKernel\EventListener\ProfilerListener(($this->services['profiler'] ?? $this->getProfilerService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), NULL, false, false);
    }

    /**
     * Gets the private 'resolve_controller_name_subscriber' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber
     */
    protected function getResolveControllerNameSubscriberService()
    {
        return $this->privates['resolve_controller_name_subscriber'] = new \Symfony\Bundle\FrameworkBundle\EventListener\ResolveControllerNameSubscriber(($this->privates['controller_name_converter'] ?? ($this->privates['controller_name_converter'] = new \Symfony\Bundle\FrameworkBundle\Controller\ControllerNameParser(($this->services['kernel'] ?? $this->get('kernel', 1))))));
    }

    /**
     * Gets the private 'router.request_context' shared service.
     *
     * @return \Symfony\Component\Routing\RequestContext
     */
    protected function getRouter_RequestContextService()
    {
        return $this->privates['router.request_context'] = new \Symfony\Component\Routing\RequestContext('', 'GET', 'localhost', 'http', 80, 443);
    }

    /**
     * Gets the private 'router_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouterListenerService()
    {
        return $this->privates['router_listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(($this->services['router'] ?? $this->getRouterService()), ($this->services['request_stack'] ?? ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())), ($this->privates['router.request_context'] ?? $this->getRouter_RequestContextService()), ($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())), $this->targetDirs[3], true);
    }

    /**
     * Gets the private 'session_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\SessionListener
     */
    protected function getSessionListenerService()
    {
        return $this->privates['session_listener'] = new \Symfony\Component\HttpKernel\EventListener\SessionListener(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'initialized_session' => ['services', 'session', NULL, true],
            'request_stack' => ['services', 'request_stack', 'getRequestStackService', false],
            'session' => ['services', 'session', 'getSessionService.php', true],
            'session_storage' => ['privates', 'session.storage.native', 'getSession_Storage_NativeService.php', true],
        ], [
            'initialized_session' => '?',
            'request_stack' => '?',
            'session' => '?',
            'session_storage' => '?',
        ]));
    }

    /**
     * Gets the private 'snc_redis.logger' shared service.
     *
     * @return \Snc\RedisBundle\Logger\RedisLogger
     */
    protected function getSncRedis_LoggerService()
    {
        return $this->privates['snc_redis.logger'] = new \Snc\RedisBundle\Logger\RedisLogger(($this->privates['logger'] ?? ($this->privates['logger'] = new \Symfony\Component\HttpKernel\Log\Logger())));
    }

    /**
     * Gets the private 'translator.default' shared service.
     *
     * @return \Symfony\Bundle\FrameworkBundle\Translation\Translator
     */
    protected function getTranslator_DefaultService()
    {
        $this->privates['translator.default'] = $instance = new \Symfony\Bundle\FrameworkBundle\Translation\Translator(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'translation.loader.csv' => ['privates', 'translation.loader.csv', 'getTranslation_Loader_CsvService.php', true],
            'translation.loader.dat' => ['privates', 'translation.loader.dat', 'getTranslation_Loader_DatService.php', true],
            'translation.loader.ini' => ['privates', 'translation.loader.ini', 'getTranslation_Loader_IniService.php', true],
            'translation.loader.json' => ['privates', 'translation.loader.json', 'getTranslation_Loader_JsonService.php', true],
            'translation.loader.mo' => ['privates', 'translation.loader.mo', 'getTranslation_Loader_MoService.php', true],
            'translation.loader.php' => ['privates', 'translation.loader.php', 'getTranslation_Loader_PhpService.php', true],
            'translation.loader.po' => ['privates', 'translation.loader.po', 'getTranslation_Loader_PoService.php', true],
            'translation.loader.qt' => ['privates', 'translation.loader.qt', 'getTranslation_Loader_QtService.php', true],
            'translation.loader.res' => ['privates', 'translation.loader.res', 'getTranslation_Loader_ResService.php', true],
            'translation.loader.xliff' => ['privates', 'translation.loader.xliff', 'getTranslation_Loader_XliffService.php', true],
            'translation.loader.yml' => ['privates', 'translation.loader.yml', 'getTranslation_Loader_YmlService.php', true],
        ], [
            'translation.loader.csv' => '?',
            'translation.loader.dat' => '?',
            'translation.loader.ini' => '?',
            'translation.loader.json' => '?',
            'translation.loader.mo' => '?',
            'translation.loader.php' => '?',
            'translation.loader.po' => '?',
            'translation.loader.qt' => '?',
            'translation.loader.res' => '?',
            'translation.loader.xliff' => '?',
            'translation.loader.yml' => '?',
        ]), new \Symfony\Component\Translation\Formatter\MessageFormatter(new \Symfony\Component\Translation\IdentityTranslator()), 'en', ['translation.loader.php' => [0 => 'php'], 'translation.loader.yml' => [0 => 'yaml', 1 => 'yml'], 'translation.loader.xliff' => [0 => 'xlf', 1 => 'xliff'], 'translation.loader.po' => [0 => 'po'], 'translation.loader.mo' => [0 => 'mo'], 'translation.loader.qt' => [0 => 'ts'], 'translation.loader.csv' => [0 => 'csv'], 'translation.loader.res' => [0 => 'res'], 'translation.loader.dat' => [0 => 'dat'], 'translation.loader.ini' => [0 => 'ini'], 'translation.loader.json' => [0 => 'json']], ['cache_dir' => ($this->targetDirs[0].'/translations'), 'debug' => true, 'resource_files' => ['af' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.af.xlf')], 'ar' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.ar.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.ar.xlf')], 'az' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.az.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.az.xlf')], 'be' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.be.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.be.xlf')], 'bg' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.bg.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.bg.xlf')], 'ca' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.ca.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.ca.xlf')], 'cs' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.cs.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.cs.xlf')], 'cy' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.cy.xlf')], 'da' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.da.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.da.xlf')], 'de' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.de.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.de.xlf')], 'el' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.el.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.el.xlf')], 'en' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.en.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.en.xlf')], 'es' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.es.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.es.xlf')], 'et' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.et.xlf')], 'eu' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.eu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.eu.xlf')], 'fa' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.fa.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.fa.xlf')], 'fi' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.fi.xlf')], 'fr' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.fr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.fr.xlf')], 'gl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.gl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.gl.xlf')], 'he' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.he.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.he.xlf')], 'hr' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.hr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.hr.xlf')], 'hu' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.hu.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.hu.xlf')], 'hy' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.hy.xlf')], 'id' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.id.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.id.xlf')], 'it' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.it.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.it.xlf')], 'ja' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.ja.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.ja.xlf')], 'lb' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.lb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.lb.xlf')], 'lt' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.lt.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.lt.xlf')], 'lv' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.lv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.lv.xlf')], 'mn' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.mn.xlf')], 'nb' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.nb.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.nb.xlf')], 'nl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.nl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.nl.xlf')], 'nn' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.nn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.nn.xlf')], 'no' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.no.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.no.xlf')], 'pl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.pl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.pl.xlf')], 'pt' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.pt.xlf')], 'pt_BR' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.pt_BR.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.pt_BR.xlf')], 'ro' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.ro.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.ro.xlf')], 'ru' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.ru.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.ru.xlf')], 'sk' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.sk.xlf')], 'sl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.sl.xlf')], 'sq' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sq.xlf')], 'sr_Cyrl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sr_Cyrl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.sr_Cyrl.xlf')], 'sr_Latn' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sr_Latn.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.sr_Latn.xlf')], 'sv' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.sv.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.sv.xlf')], 'th' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.th.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.th.xlf')], 'tl' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.tl.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.tl.xlf')], 'tr' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.tr.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.tr.xlf')], 'uk' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.uk.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.uk.xlf')], 'vi' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.vi.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.vi.xlf')], 'zh_CN' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.zh_CN.xlf'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.zh_CN.xlf')], 'zh_TW' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations/validators.zh_TW.xlf')], 'pt_PT' => [0 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations/security.pt_PT.xlf')]], 'scanned_directories' => [0 => ($this->targetDirs[3].'/vendor/symfony/validator/Resources/translations'), 1 => ($this->targetDirs[3].'/vendor/symfony/security-core/Resources/translations'), 2 => ($this->targetDirs[3].'/translations/'), 3 => ($this->targetDirs[3].'/translations'), 4 => ($this->targetDirs[3].'/vendor/symfony/framework-bundle/Resources/translations'), 5 => ($this->targetDirs[3].'/src/Infrastructure/Resources/FrameworkBundle/translations'), 6 => ($this->targetDirs[3].'/vendor/symfony/web-server-bundle/Resources/translations'), 7 => ($this->targetDirs[3].'/src/Infrastructure/Resources/WebServerBundle/translations'), 8 => ($this->targetDirs[3].'/vendor/symfony/twig-bundle/Resources/translations'), 9 => ($this->targetDirs[3].'/src/Infrastructure/Resources/TwigBundle/translations'), 10 => ($this->targetDirs[3].'/vendor/symfony/web-profiler-bundle/Resources/translations'), 11 => ($this->targetDirs[3].'/src/Infrastructure/Resources/WebProfilerBundle/translations'), 12 => ($this->targetDirs[3].'/vendor/snc/redis-bundle/Resources/translations'), 13 => ($this->targetDirs[3].'/src/Infrastructure/Resources/SncRedisBundle/translations'), 14 => ($this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle/Resources/translations'), 15 => ($this->targetDirs[3].'/src/Infrastructure/Resources/FOSRestBundle/translations'), 16 => ($this->targetDirs[3].'/vendor/jms/serializer-bundle/Resources/translations'), 17 => ($this->targetDirs[3].'/src/Infrastructure/Resources/JMSSerializerBundle/translations'), 18 => ($this->targetDirs[3].'/src/Infrastructure/Resources/translations')]]);

        $instance->setConfigCacheFactory(($this->privates['config_cache_factory'] ?? $this->getConfigCacheFactoryService()));
        $instance->setFallbackLocales([0 => 'en']);

        return $instance;
    }

    /**
     * Gets the private 'validator.builder' shared service.
     *
     * @return \Symfony\Component\Validator\ValidatorBuilderInterface
     */
    protected function getValidator_BuilderService()
    {
        $this->privates['validator.builder'] = $instance = \Symfony\Component\Validator\Validation::createValidatorBuilder();

        $instance->setConstraintValidatorFactory(new \Symfony\Component\Validator\ContainerConstraintValidatorFactory(new \Symfony\Component\DependencyInjection\Argument\ServiceLocator($this->getService, [
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => ['privates', 'validator.email', 'getValidator_EmailService.php', true],
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => ['privates', 'validator.not_compromised_password', 'getValidator_NotCompromisedPasswordService.php', true],
            'validator.expression' => ['privates', 'validator.expression', 'getValidator_ExpressionService.php', true],
        ], [
            'Symfony\\Component\\Validator\\Constraints\\EmailValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\ExpressionValidator' => '?',
            'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPasswordValidator' => '?',
            'validator.expression' => '?',
        ])));
        $instance->setTranslator(new \Symfony\Component\Validator\Util\LegacyTranslatorProxy(($this->services['translator'] ?? $this->getTranslatorService())));
        $instance->setTranslationDomain('validators');
        $instance->enableAnnotationMapping(($this->privates['annotations.reader'] ?? $this->getAnnotations_ReaderService()));
        $instance->addMethodMapping('loadValidatorMetadata');
        $instance->addObjectInitializers([]);

        return $instance;
    }

    /**
     * Gets the private 'web_profiler.csp.handler' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler
     */
    protected function getWebProfiler_Csp_HandlerService()
    {
        return $this->privates['web_profiler.csp.handler'] = new \Symfony\Bundle\WebProfilerBundle\Csp\ContentSecurityPolicyHandler(new \Symfony\Bundle\WebProfilerBundle\Csp\NonceGenerator());
    }

    /**
     * Gets the private 'web_profiler.debug_toolbar' shared service.
     *
     * @return \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener
     */
    protected function getWebProfiler_DebugToolbarService()
    {
        return $this->privates['web_profiler.debug_toolbar'] = new \Symfony\Bundle\WebProfilerBundle\EventListener\WebDebugToolbarListener(($this->services['twig'] ?? $this->getTwigService()), false, 2, ($this->services['router'] ?? $this->getRouterService()), '^/((index|app(_[\\w]+)?)\\.php/)?_wdt', ($this->privates['web_profiler.csp.handler'] ?? $this->getWebProfiler_Csp_HandlerService()));
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return $this->buildParameters[$name];
        }

        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        if (isset($this->buildParameters[$name])) {
            return true;
        }

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            foreach ($this->buildParameters as $name => $value) {
                $parameters[$name] = $value;
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [
        'kernel.root_dir' => false,
        'kernel.project_dir' => false,
        'kernel.cache_dir' => false,
        'kernel.logs_dir' => false,
        'kernel.bundles_metadata' => false,
        'kernel.secret' => false,
        'session.save_path' => false,
        'validator.mapping.cache.file' => false,
        'translator.default_path' => false,
        'profiler.storage.dsn' => false,
        'debug.container.dump' => false,
        'twig.default_path' => false,
    ];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        switch ($name) {
            case 'kernel.root_dir': $value = ($this->targetDirs[3].'/src/Infrastructure'); break;
            case 'kernel.project_dir': $value = $this->targetDirs[3]; break;
            case 'kernel.cache_dir': $value = $this->targetDirs[0]; break;
            case 'kernel.logs_dir': $value = ($this->targetDirs[2].'/log'); break;
            case 'kernel.bundles_metadata': $value = [
                'FrameworkBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/symfony/framework-bundle'),
                    'namespace' => 'Symfony\\Bundle\\FrameworkBundle',
                ],
                'WebServerBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/symfony/web-server-bundle'),
                    'namespace' => 'Symfony\\Bundle\\WebServerBundle',
                ],
                'TwigBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/symfony/twig-bundle'),
                    'namespace' => 'Symfony\\Bundle\\TwigBundle',
                ],
                'WebProfilerBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/symfony/web-profiler-bundle'),
                    'namespace' => 'Symfony\\Bundle\\WebProfilerBundle',
                ],
                'SncRedisBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/snc/redis-bundle'),
                    'namespace' => 'Snc\\RedisBundle',
                ],
                'FOSRestBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/friendsofsymfony/rest-bundle'),
                    'namespace' => 'FOS\\RestBundle',
                ],
                'JMSSerializerBundle' => [
                    'path' => ($this->targetDirs[3].'/vendor/jms/serializer-bundle'),
                    'namespace' => 'JMS\\SerializerBundle',
                ],
            ]; break;
            case 'kernel.secret': $value = $this->getEnv('APP_SECRET'); break;
            case 'session.save_path': $value = ($this->targetDirs[0].'/sessions'); break;
            case 'validator.mapping.cache.file': $value = ($this->targetDirs[0].'/validation.php'); break;
            case 'translator.default_path': $value = ($this->targetDirs[3].'/translations'); break;
            case 'profiler.storage.dsn': $value = ('file:'.$this->targetDirs[0].'/profiler'); break;
            case 'debug.container.dump': $value = ($this->targetDirs[0].'/InfrastructureApp_Infrastructure_KernelDevDebugContainer.xml'); break;
            case 'twig.default_path': $value = ($this->targetDirs[3].'/templates'); break;
            default: throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
        }
        $this->loadedDynamicParameters[$name] = true;

        return $this->dynamicParameters[$name] = $value;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'kernel.environment' => 'dev',
            'kernel.debug' => true,
            'kernel.name' => 'Infrastructure',
            'kernel.bundles' => [
                'FrameworkBundle' => 'Symfony\\Bundle\\FrameworkBundle\\FrameworkBundle',
                'WebServerBundle' => 'Symfony\\Bundle\\WebServerBundle\\WebServerBundle',
                'TwigBundle' => 'Symfony\\Bundle\\TwigBundle\\TwigBundle',
                'WebProfilerBundle' => 'Symfony\\Bundle\\WebProfilerBundle\\WebProfilerBundle',
                'SncRedisBundle' => 'Snc\\RedisBundle\\SncRedisBundle',
                'FOSRestBundle' => 'FOS\\RestBundle\\FOSRestBundle',
                'JMSSerializerBundle' => 'JMS\\SerializerBundle\\JMSSerializerBundle',
            ],
            'kernel.charset' => 'UTF-8',
            'kernel.container_class' => 'InfrastructureApp_Infrastructure_KernelDevDebugContainer',
            'container.dumper.inline_class_loader' => true,
            'locale' => 'en',
            'fragment.renderer.hinclude.global_template' => '',
            'fragment.path' => '/_fragment',
            'kernel.http_method_override' => true,
            'kernel.trusted_hosts' => [

            ],
            'kernel.default_locale' => 'en',
            'templating.helper.code.file_link_format' => NULL,
            'debug.file_link_format' => NULL,
            'session.metadata.storage_key' => '_sf2_meta',
            'session.storage.options' => [
                'cache_limiter' => '0',
                'cookie_secure' => 'auto',
                'cookie_httponly' => true,
                'cookie_samesite' => 'lax',
                'gc_probability' => 1,
            ],
            'session.metadata.update_threshold' => 0,
            'validator.mapping.cache.prefix' => '',
            'validator.translation_domain' => 'validators',
            'translator.logging' => false,
            'profiler_listener.only_exceptions' => false,
            'profiler_listener.only_master_requests' => false,
            'debug.error_handler.throw_at' => -1,
            'router.request_context.host' => 'localhost',
            'router.request_context.scheme' => 'http',
            'router.request_context.base_url' => '',
            'router.resource' => 'kernel::loadRoutes',
            'router.cache_class_prefix' => 'InfrastructureApp_Infrastructure_KernelDevDebugContainer',
            'request_listener.http_port' => 80,
            'request_listener.https_port' => 443,
            'twig.exception_listener.controller' => 'twig.controller.exception::showAction',
            'twig.form.resources' => [
                0 => 'form_div_layout.html.twig',
            ],
            'web_profiler.debug_toolbar.intercept_redirects' => false,
            'web_profiler.debug_toolbar.mode' => 2,
            'snc_redis.client.class' => 'Predis\\Client',
            'snc_redis.client_options.class' => 'Predis\\Configuration\\Options',
            'snc_redis.connection_parameters.class' => 'Predis\\Connection\\Parameters',
            'snc_redis.connection_factory.class' => 'Snc\\RedisBundle\\Client\\Predis\\Connection\\ConnectionFactory',
            'snc_redis.connection_wrapper.class' => 'Snc\\RedisBundle\\Client\\Predis\\Connection\\ConnectionWrapper',
            'snc_redis.phpredis_client.class' => 'Redis',
            'snc_redis.phpredis_connection_wrapper.class' => 'Snc\\RedisBundle\\Client\\Phpredis\\Client',
            'snc_redis.logger.class' => 'Snc\\RedisBundle\\Logger\\RedisLogger',
            'snc_redis.data_collector.class' => 'Snc\\RedisBundle\\DataCollector\\RedisDataCollector',
            'snc_redis.doctrine_cache_phpredis.class' => 'Doctrine\\Common\\Cache\\RedisCache',
            'snc_redis.doctrine_cache_predis.class' => 'Doctrine\\Common\\Cache\\PredisCache',
            'snc_redis.monolog_handler.class' => 'Monolog\\Handler\\RedisHandler',
            'snc_redis.swiftmailer_spool.class' => 'Snc\\RedisBundle\\SwiftMailer\\RedisSpool',
            'data_collector.templates' => [
                'data_collector.request' => [
                    0 => 'request',
                    1 => '@WebProfiler/Collector/request.html.twig',
                ],
                'data_collector.time' => [
                    0 => 'time',
                    1 => '@WebProfiler/Collector/time.html.twig',
                ],
                'data_collector.memory' => [
                    0 => 'memory',
                    1 => '@WebProfiler/Collector/memory.html.twig',
                ],
                'data_collector.validator' => [
                    0 => 'validator',
                    1 => '@WebProfiler/Collector/validator.html.twig',
                ],
                'data_collector.ajax' => [
                    0 => 'ajax',
                    1 => '@WebProfiler/Collector/ajax.html.twig',
                ],
                'data_collector.exception' => [
                    0 => 'exception',
                    1 => '@WebProfiler/Collector/exception.html.twig',
                ],
                'data_collector.logger' => [
                    0 => 'logger',
                    1 => '@WebProfiler/Collector/logger.html.twig',
                ],
                'data_collector.events' => [
                    0 => 'events',
                    1 => '@WebProfiler/Collector/events.html.twig',
                ],
                'data_collector.router' => [
                    0 => 'router',
                    1 => '@WebProfiler/Collector/router.html.twig',
                ],
                'data_collector.cache' => [
                    0 => 'cache',
                    1 => '@WebProfiler/Collector/cache.html.twig',
                ],
                'data_collector.translation' => [
                    0 => 'translation',
                    1 => '@WebProfiler/Collector/translation.html.twig',
                ],
                'data_collector.twig' => [
                    0 => 'twig',
                    1 => '@WebProfiler/Collector/twig.html.twig',
                ],
                'snc_redis.data_collector' => [
                    0 => 'redis',
                    1 => '@SncRedis/Collector/redis.html.twig',
                ],
                'data_collector.config' => [
                    0 => 'config',
                    1 => '@WebProfiler/Collector/config.html.twig',
                ],
            ],
            'console.command.ids' => [

            ],
        ];
    }
}
