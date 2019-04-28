<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 14:27
 */

class Service implements JsonSerializable
{
    private $id;
    private $name;
    private $description;
    private $category;
    private $chief;
    private $address;
    private $postal_code;
    private $picture;

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }


    public static function  ServFromArray(array  $data): ?Service{
        if (Validator::validate($data,['id','name','description',
            'category_id','chief_id','address','postal_code',
            'picture'])){
            $s = new Service(NULL,
                $data['name'],
                $data['description'],
                $data['category_id'],
                $data['chief_id'],
                $data['address'],
                $data['postal_code'],
                $data['picture']
            );
            if(isset($data['id'])){
                $s->setId($data['id']);
            }
            return $s;
        }
        return NULL;
    }


    /**
     * service constructor.
     * @param $id
     * @param $name
     * @param $description
     * @param $category
     * @param $chief
     * @param $address
     * @param $postal_code
     * @param $picture
     */
    public function __construct(?int $id,
                                string $name,
                                string $description,
                                int $category,
                                int $chief,
                                string $address,
                                ?string $postal_code,
                                ?string $picture)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->category = $category;
        $this->chief = $chief;
        $this->address = $address;
        $this->postal_code = $postal_code;
        $this->picture = $picture;
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