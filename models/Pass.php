<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 09/04/2019
 * Time: 11:10
 */

require_once __DIR__.'/../utils/validator.php';

class Pass implements JsonSerializable
{
    private $id;
    private $name;
    private $price;


    public static function  PASSFromArray(array  $data): ?Pass{
        if (Validator::validate($data,['name','price'])){
            $p = new Pass(NULL,$data['name'],$data['price']);
            if(isset($data['id'])){
                $p->setId($data['id']);
            }
            return $p;
        }
        return NULL;
    }

    public function __construct($id, $name, $price)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
    }
}