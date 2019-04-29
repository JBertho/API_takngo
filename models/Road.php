<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 29/04/2019
 * Time: 14:13
 */

class Road implements JsonSerializable
{
    private $id;
    private $drive;
    private $start_street;
    private $end_street;
    private $distance;
    private $appointment;
    private $order;

    /**
     * @return int|null
     */
    public function getDrive(): ?int
    {
        return $this->drive;
    }
    private $price;

    public static function  RoadFromArray(array  $data): ?Road{
        $r = new Road(NULL,
            $data['driver_id'],
            $data['start_street'],
            $data['end_street'],
            $data['distance'],
            $data['appointment'],
            $data['orders_id'],
            $data['price']
        );
        if(isset($data['id'])){
            $r->setId($data['id']);
        }
        return $r;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }



    /**
     * Road constructor.
     * @param $id
     * @param $drive
     * @param $start_street
     * @param $end_street
     * @param $distance
     * @param $appointment
     * @param $order
     * @param $price
     */
    public function __construct(?int $id,
                                ?int $drive,
                                ?string $start_street,
                                ?string $end_street,
                                ?float $distance,
                                $appointment,
                                ?int $order,
                                ?float $price)
    {
        $this->id = $id;
        $this->drive = $drive;
        $this->start_street = $start_street;
        $this->end_street = $end_street;
        $this->distance = $distance;
        $this->appointment = $appointment;
        $this->order = $order;
        $this->price = $price;
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