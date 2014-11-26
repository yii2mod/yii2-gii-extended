<?php

namespace yii2mod\gii\enum;

use Yii;
use yii\gii\CodeFile;

use yii\helpers\Inflector;

/**
 * This generator will generate the enumerable class.
 *
 * @property array $constValues An array of constant values entered by the user.
 * @property string $enumerableClass The enumerable class name without the namespace part. This property is
 * read-only.
 * @property string $author The author name in generated Enumerable class.
 * @property string $description The description text in generated Enumerable class.
 * read-only.
 * @author Igor Chepurnoy
 *
 * @since 1.0
 */
class Generator extends \yii\gii\Generator
{

    public $enumarablePath = '@app/models/enumerables';

    /**
     * @var string the Enumerable class
     */
    public $enumerableClass;

    /**
     * @var string author in generated Enumerable class
     */
    public $author = 'Igor Chepurnoy';

    /**
     * @var string description in generated Enumerable class
     */
    public $description = 'This is the CEnumerable class for';

    /**
     * @var string constants values. Separate multiple values with commas or spaces.
     */
    public $constValues;

    /**
     * @var string the namespace of the enumerable class
     */
    public $ns = 'app\models\enumerables';


    public function init()
    {
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return 'Enumerable Generator';
    }

    /**
     * @inheritdoc
     */
    public function getDescription()
    {
        return 'This generator helps you to quickly generate a new Enumerable class';

    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['enumerableClass', 'constValues','description','ns'], 'filter', 'filter' => 'trim'],
            [['enumerableClass', 'constValues'], 'required'],
            [['enumerableClass'], 'match', 'pattern' => '/^[a-z][a-z0-9\\-\\/]*$/', 'message' => 'Only a-z, 0-9, dashes (-) and slashes (/) are allowed.'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'enumerableClass' => 'Enumerable Class',
            'constValues'     => 'All const values',
            'description'     => 'Class description',
            'author'          => 'Author',
            'ns'              => 'Enumerable Namespace',
        ];
    }

    /**
     * @inheritdoc
     */
    public function requiredTemplates()
    {
        return [
            'enumerable.php',
        ];
    }

    /**
     * @inheritdoc
     */
    public function stickyAttributes()
    {
        return ['constValues', 'enumerableClass'];
    }

    /**
     * @inheritdoc
     */
    public function hints()
    {
        return [

            'ns' => 'This is the namespace that the new enumerable class will use.',
            'enumerableClass' => 'Enumerable ID should be in lower case and may contain module ID(s) separated by slashes. For example:
                <ul>
                    <li><code>order</code> generates <code>Order.php</code></li>
                    <li><code>order-item</code> generates <code>OrderItem.php</code></li>
                </ul>',
            'author'       => 'The author  in generated Enum class.',
            'description'  => 'Description in generated Enum class.',
            'constValues'  => 'Provide one or multiple values to generate const(s) in the Enumerable. Separate multiple values with commas or spaces. For Example:
            <code>free,paid</code> generates
            <p><code>const FREE = 0;</code></p>
            <p><code>const PAID = 1;</code></p>


            '
        ];
    }

    /**
     * @inheritdoc
     */
    public function successMessage()
    {
        return "The Enumerable class has been generated successfully.";
    }

    /**
     * @inheritdoc
     */
    public function generate()
    {
        $files = [];

        $files[] = new CodeFile(
            $this->getPathEnumerableClass(),
            $this->render('enumerable.php')
        );

        return $files;
    }

    /**
     * @return string the enumerable class name without the namespace part.
     */
    public function getEnumerableClass()
    {
        return Inflector::id2camel($this->enumerableClass);
    }

    /**
     * Get absolute path for generated Enumerable file
     * @return string
     */
    public function getPathEnumerableClass()
    {
        return Yii::getAlias($this->enumarablePath) . '/' .  $this->getEnumerableClass() . '.php';
    }

    /**
     * Normalizes [[constValues]] into an array of const values.
     * @return array an array of const values entered by the user
     */
    public function getConstIDs()
    {
        $actions = array_unique(preg_split('/[\s,]+/', $this->constValues, -1, PREG_SPLIT_NO_EMPTY));
        sort($actions);

        return $actions;
    }

    /**
     * Get author for Enumerable class
     * @return string
     */
    public function getAuthor()
    {
       return $this->author;
    }

    /**
     * Get description for Enumerable class
     * @return string
     */
    public function getEnumerableDescription()
    {
       return $this->description;
    }
}
