<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 15:46
 */

class Product implements JsonSerializable
{
    private $id;
    private $name;
    private $price;
    private $description;
    private $service;
    private $pict;
    private $duration_activity;


    public static function  ProductFromArray(array  $data): ?User{
            $u = new User(NULL,
                $data['name'],
                $data['price'],
                $data['description'],
                $data['service'],
                $data['pict'],
                $data['duration_activity']
            );
            if(isset($data['id'])){
                $u->setId($data['id']);
            }
            return $u;
    }

    /**
     * Product constructor.
     * @param $id
     * @param $name
     * @param $price
     * @param $description
     * @param $service
     * @param $pict
     * @param $duration_activity
     */
    public function __construct(?int $id,
                                string $name,
                                float $price,
                                ?string $description,
                                int $service,
                                ?string $pict,
                                $duration_activity)
    {
        $this->id = $id;
        $this->name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->service = $service;
        $this->pict = $pict;
        $this->duration_activity = $duration_activity;
    }
    public function setId($id){
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
        return get_object_vars($this);
    }
}