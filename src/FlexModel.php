<?php

namespace FlexModel;

use DOMDocument;
use XSLTProcessor;

/**
 * FlexModel.
 *
 * @author Niels Nijens <niels@connectholland.nl>
 */
class FlexModel
{
    /**
     * The identifier of this instance.
     *
     * @var string
     */
    private $identifier;

    /**
     * The loaded configuration.
     *
     * @var array
     */
    private $configuration;

    /**
     * The DOMDocument instance with the XML configuration.
     *
     * @var DOMDocument
     */
    private $domDocument;

    /**
     * The location of cache path.
     *
     * @var string
     */
    private $cachePath;

    /**
     * The location of XML Schema file.
     *
     * @var string
     */
    private $xmlSchemaFile = __DIR__.'/Resources/xsd/flexmodel.xsd';

    /**
     * The registered external object references.
     *
     * @var string[]
     */
    private $externalObjectReferences = array();

    /**
     * The default field configuration.
     *
     * @var array
     */
    protected $defaultFieldConfiguration = array(
        'name' => '',
        'label' => null,
        'datatype' => '',
        'options' => null,
        'default_value' => null,
    );

    /**
     * Constructs a new FlexModel instance.
     *
     * @param string $identifier
     */
    public function __construct($identifier = 'default')
    {
        $this->identifier = $identifier;
    }

    /**
     * Loads the XML configuration.
     *
     * @param DOMDocument $domDocument
     * @param string      $cachePath
     * @param string|null $xmlSchemaFile
     */
    public function load(DOMDocument $domDocument, $cachePath, $xmlSchemaFile = null)
    {
        $this->domDocument = $domDocument;
        $this->cachePath = $cachePath;
        if (isset($xmlSchemaFile)) {
            $this->xmlSchemaFile = $xmlSchemaFile;
        }

        $this->loadConfiguration();
    }

    /**
     * Reloads the configuration.
     */
    public function reload()
    {
    }

    /**
     * Returns the DOMDocument instance with the XML configuration.
     *
     * @return DOMDocument
     */
    public function getDOMDocument()
    {
    }

    /**
     * Returns the path to the cache directory.
     *
     * @return string
     */
    public function getCachePath()
    {
        return $this->cachePath;
    }

    /**
     * Returns the location of the flexmodel cache file.
     *
     * @return string|null
     */
    public function getCacheFile()
    {
        if (isset($this->cachePath)) {
            return sprintf('%s/flexmodel-%s.php', $this->cachePath, $this->identifier);
        }
    }

    /**
     * Returns true when the configuration contains an object with the specified object name.
     *
     * @param string $objectName
     *
     * @return bool
     */
    public function hasObject($objectName)
    {
    }

    /**
     * Returns true when the configuration of an object contains the specified field name.
     *
     * @param string $objectName
     * @param string $fieldName
     *
     * @return bool
     */
    public function hasField($objectName, $fieldName)
    {
    }

    /**
     * Returns true when the datatype is a valid object reference.
     *
     * @param string $datatype
     *
     * @return bool
     */
    public function isObjectReference($datatype)
    {
    }

    /**
     * Returns all configured object names.
     *
     * @return array
     */
    public function getObjectNames()
    {
    }

    /**
     * Returns the model for the specified object.
     *
     * @param string $objectName
     *
     * @return array
     */
    public function getModelConfiguration($objectName)
    {
    }

    /**
     * Returns field configuration of the specified form in the object.
     *
     * @param string $objectName
     * @param string $formName
     *
     * @return array
     */
    public function getFormConfiguration($objectName, $formName)
    {
    }

    /**
     * Returns field configuration of the specified view in the object.
     *
     * @param string $objectName
     * @param string $viewName
     *
     * @return array|null
     */
    public function getViewConfiguration($objectName, $viewName)
    {
    }

    /**
     * Returns all the field configurations of views in the viewgroup of the specified view name.
     *
     * @param string $objectName
     * @param string $viewName
     *
     * @return array
     */
    public function getViewConfigurationsByViewgroupOfView($objectName, $viewName)
    {
    }

    /**
     * Returns the field names of the specified object.
     *
     * @return array
     */
    public function getFieldNames($objectName)
    {
    }

    /**
     * Returns the field names of the specified view in the object.
     *
     * @param string $objectName
     * @param string $viewName
     *
     * @return array
     */
    public function getFieldNamesByView($objectName, $viewName)
    {
    }

    /**
     * Returns all fields for the object.
     *
     * @param string $objectName
     *
     * @return array
     */
    public function getFields($objectName)
    {
    }

    /**
     * Returns all fields with the specified datatype for an object.
     *
     * @param string $objectName
     * @param string $datatype
     *
     * @return array|null
     */
    public function getFieldsByDatatype($objectName, $datatype)
    {
    }

    /**
     * Returns the fields in the object view.
     *
     * @param string $objectName
     * @param string $viewName
     *
     * @return array
     */
    public function getFieldsByView($objectName, $viewName)
    {
    }

    /**
     * Returns the configuration of a field in the specified object.
     *
     * @param string $objectName
     * @param string $fieldName
     *
     * @return array|null
     */
    public function getField($objectName, $fieldName, $excludeFormDefaults = true)
    {
    }

    /**
     * Returns the field reference of the specified object.
     * The returned excluded field name parts can be used to retrieve the field for the referenced object.
     *
     * @param string $objectName
     * @param string $fieldName
     * @param array  $excludedFieldNameParts
     * @param bool   $objectReferencesOnly
     *
     * @return array|null
     */
    public function getReferencedField($objectName, $fieldName, array & $excludedFieldNameParts = array(), $objectReferencesOnly = true)
    {
    }

    /**
     * Adds an object name which is a valid datatype reference outside of the configuration.
     *
     * @param string $objectName
     */
    public function addExternalObjectReference($objectName)
    {
    }

    /**
     * Sorts field configuration array by location.
     *
     * @param array $field1
     * @param array $field2
     *
     * @return int
     */
    public function sortByLocation(array $field1, array $field2)
    {
    }

    /**
     * Returns true when the value should be quoted.
     *
     * @param string $value
     *
     * @return bool
     */
    public static function isQuotedValue($value)
    {
        if (ctype_digit($value) || in_array($value, array('true', 'false', 'null'))) {
            return false;
        }

        return true;
    }

    /**
     * Loads the cache file or generates the cache file (and loads it afterwards).
     *
     * @param bool $generateCacheFile
     */
    private function loadConfiguration($generateCacheFile = true)
    {
        $cacheFile = $this->getCacheFile();
        if (is_file($cacheFile)) {
            $configuration = require $cacheFile;
            if (isset($configuration['__checksum']) && $configuration['__checksum'] === md5($this->domDocument->saveXML())) {
                unset($configuration['__checksum']);
                $this->configuration = $configuration;

                $generateCacheFile = false;
            }
        }

        if ($generateCacheFile === true) {
            $this->generateCacheFile();
        }
    }

    /**
     * Generates the cache file.
     */
    private function generateCacheFile()
    {
        $previousErrorSetting = libxml_use_internal_errors(true);
        libxml_clear_errors();
        if (@$this->domDocument->schemaValidate($this->xmlSchemaFile)) {
            $this->domDocument->preserveWhiteSpace = false;
            // Reload the XML to strip whitespace from XIncluded XML.
            $this->domDocument->loadXML($this->domDocument->saveXML());

            $xslDocument = new DOMDocument('1.0', 'UTF-8');
            $xslDocument->load(__DIR__.'/Resources/xsl/flexmodel-cache.xsl');

            $processor = new XSLTProcessor();
            $processor->setParameter('', 'checksum', md5($this->domDocument->saveXML()));
            $processor->importStyleSheet($xslDocument);
            $processor->registerPHPFunctions();

            $configuration = $processor->transformToXML($this->domDocument);
            file_put_contents($this->getCacheFile(), $configuration);

            $this->loadConfiguration(false);
        } else {
            $errors = libxml_get_errors();
            foreach ($errors as $error) {
                trigger_error(sprintf('Line %s: %s in "%s"', $error->line, trim($error->message), $error->file), E_USER_WARNING);
            }
            libxml_clear_errors();
        }
        libxml_use_internal_errors($previousErrorSetting);
    }
}
