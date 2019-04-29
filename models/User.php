<?php
/**
 * Created by IntelliJ IDEA.
 * User: James
 * Date: 28/04/2019
 * Time: 13:52
 */

class User implements JsonSerializable
{
    public static  $roles = [
        1 => "ROLE_USER",
        2 => "ROLE_ADMIN",
        3 => "ROLE_SERVICE",
        4 => "ROLE_ENTREPRISE",
        5 =>  "ROLE_ABONNEMENT",
        6 => "ROLE_DRIVER",
    ];

    private $id;
    private $email;
    private $lastname;
    private $name;
    private $birthday;
    private $password;
    private $profile_pict;
    private $company;
    private $address;
    private $postal_code;
    private $phone;





    public static function  UserFromArray(array  $data): ?User{
        if (Validator::validate($data,['id','email','lastname',
                                                'name','birthday','password','profile_pict',
                                                'company_id','address','postal_code','phone'])){
            $u = new User(NULL,
                $data['email'],
                $data['lastname'],
                $data['name'],
                $data['birthday'],
                $data['password'],
                $data['profile_pict'],
                $data['company_id'],
                $data['address'],
                $data['postal_code'],
                $data['phone']
                );
            if(isset($data['id'])){
                $u->setId($data['id']);
            }
            return $u;
        }
        return NULL;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }




    /**
     * User constructor.
     * @param $id
     * @param $email
     * @param $lastname
     * @param $name
     * @param $birthday
     * @param $password
     * @param $profile_pict
     * @param $company
     * @param $address
     * @param $postal_code
     * @param $phone
     */
    public function __construct(?int $id,
                                string $email,
                                string $lastname,
                                string $name,
                                $birthday,
                                string $password,
                                ?string $profile_pict,
                                ?int $company,
                                string $address,
                                ?string $postal_code,
                                string $phone)
    {
        $this->id = $id;
        $this->email = $email;
        $this->lastname = $lastname;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->password = $password;
        $this->profile_pict = $profile_pict;
        $this->company = $company;
        $this->address = $address;
        $this->postal_code = $postal_code;
        $this->phone = $phone;
    }
    public function setId($id){
        $this->id = $id;
    }

    public static function tradRoles($data){
        $array = [];
        foreach ($data as $one){
            array_push($array,self::$roles[$one['role_id']]);
        }
        return $array;

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