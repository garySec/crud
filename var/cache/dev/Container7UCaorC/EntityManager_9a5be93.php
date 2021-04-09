<?php

namespace Container7UCaorC;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder3c30c = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerd2f7a = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties71969 = [
        
    ];

    public function getConnection()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getConnection', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getMetadataFactory', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getExpressionBuilder', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'beginTransaction', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getCache', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getCache();
    }

    public function transactional($func)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'transactional', array('func' => $func), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->transactional($func);
    }

    public function commit()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'commit', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->commit();
    }

    public function rollback()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'rollback', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getClassMetadata', array('className' => $className), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'createQuery', array('dql' => $dql), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'createNamedQuery', array('name' => $name), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'createQueryBuilder', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'flush', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'clear', array('entityName' => $entityName), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->clear($entityName);
    }

    public function close()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'close', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->close();
    }

    public function persist($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'persist', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'remove', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'refresh', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'detach', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'merge', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getRepository', array('entityName' => $entityName), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'contains', array('entity' => $entity), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getEventManager', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getConfiguration', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'isOpen', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getUnitOfWork', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getProxyFactory', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'initializeObject', array('obj' => $obj), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'getFilters', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'isFiltersStateClean', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'hasFilters', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return $this->valueHolder3c30c->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializerd2f7a = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder3c30c) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder3c30c = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder3c30c->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__get', ['name' => $name], $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        if (isset(self::$publicProperties71969[$name])) {
            return $this->valueHolder3c30c->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3c30c;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder3c30c;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3c30c;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder3c30c;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__isset', array('name' => $name), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3c30c;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder3c30c;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__unset', array('name' => $name), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder3c30c;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder3c30c;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__clone', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        $this->valueHolder3c30c = clone $this->valueHolder3c30c;
    }

    public function __sleep()
    {
        $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, '__sleep', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;

        return array('valueHolder3c30c');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerd2f7a = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerd2f7a;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerd2f7a && ($this->initializerd2f7a->__invoke($valueHolder3c30c, $this, 'initializeProxy', array(), $this->initializerd2f7a) || 1) && $this->valueHolder3c30c = $valueHolder3c30c;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder3c30c;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder3c30c;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
