<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 26/03/2019
 * Time: 10:36
 */

class Attraction implements JsonSerializable
{
    private $id;
    private $name;
    private $capacity;
    private $minHeight;
    private $duration;

    public static function  AttrFromArray(array  $data): ?Attraction{
        if (Validator::validate($data,['name','capacity','min_height','duration'])){
            $a = new Attraction(NULL,
                                $data['name'],
                                $data['capacity'],
                                $data['min_height'],
                                $data['duration']);
            if(isset($data['id'])){
                $a->setId($data['id']);
            }
            return $a;
        }
        return NULL;
    }

    public function __construct(?int $id, string $name, int $capacity,
                                float $minHeight, float $duration)
    {
        $this->id = $id;
        $this->name = $name;
        $this->capacity = $capacity;
        $this->minHeight = $minHeight;
        $this->duration = $duration;
    }
    public  function getId(): ?int { return $this->id;}
    public  function getname(): string { return $this->name;}
    public  function getcapacity(): int { return $this->capacity;}
    public  function getminHeight(): float { return $this->minHeight;}
    public  function getduration(): float { return $this->duration;}

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
        return get_object_vars($this);

    }
}