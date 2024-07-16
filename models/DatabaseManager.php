<?php

class DatabaseManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=ecf', 'admin', 'N0pl4c3t0h1d3?');
    }

    // Users
    private function getusers(): array
    {
        $bdd = $this->bdd;
        $query = $bdd->prepare('SELECT * FROM `users`');
        $req = $query->execute();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $user = new UserModel();
            $user->setUsername($row['username']);
            $user->setRole($row['role']);
            $user->setPassword($row['password']);
            $user->setLastname($row['lastname']);
            $user->setFirstname($row['firstname']);
            $user->setEmail($row['email']);
            $users[] = $user;
        }
        return $users;
    }

    public function getUser($username)
    {
        foreach ($this->getusers() as $user) {
            if ($user->getUsername() == $username) {
                return $user;
            }
        }
        return null;
    }

    // Livings
    public function getLivings(): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM livings";
        $req = $bdd->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $living = new LivingModel();
            $living->setId($row['living_id']);
            $living->setName($row['name']);
            $living->setDescription($row['description']);

            $living->setAnimals($this->getAnimalsByLiving($row['name']));

            $living->setImageId($row['image_id']);
            $living->setImage($this->getImg($row['image_id']));
            $livings[] = $living; // array of objects (LivingModel)
        }
        return $livings;
    }

    // Animals
    public function getAllAnimals(): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM animals";
        $req = $bdd->prepare($query);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $animal = new AnimalModel();
            $animal->setId($row['animal_id']);
            $animal->setName($row['name']);
            $animal->setSpecies($row['species']);
            $animal->setLiving($row['living']);
            $animal->setImageId($row['image_id']);
            $animal->setImage($this->getImg($row['image_id']));

            $animals[] = $animal; // Array of all animals in database
        }
        return $animals;
    }

    public function getAnimalById(int $animal_id): AnimalModel
    {
        $bdd = $this->bdd;
        $query = "SELECT * from animals WHERE animal_id = :animal_id";
        $req = $bdd->prepare($query);
        $req->bindValue(':animal_id',$animal_id);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)){
            $animal = new AnimalModel();
            $animal->setId($row['animal_id']);
            $animal->setName($row['name']);
            $animal->setSpecies($row['species']);
            $animal->setLiving($row['living']);
            $animal->setImageId($row['image_id']);
            $animal->setImage($this->getImg($row['image_id']));
        }
        return $animal;
    }

    public function getAnimalsByLiving($living): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM animals WHERE living = :living";
        $req = $bdd->prepare($query);
        $req->bindValue(':living', $living);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $animal = new AnimalModel();
            $animal->setId($row['animal_id']);
            $animal->setName($row['name']);
            $animal->setSpecies($row['species']);
            $animal->setLiving($row['living']);
            $animal->setImageId($row['image_id']);
            $animal->setImage($this->getImg($row['image_id']));
            $animals[] = $animal; // Array of animals in a certain living
        }
        return  $animals;
    }

    public function addAnimal($name, $species, $living, $lastInsertedId)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO animals(name, species, living, image_id) VALUES ('$name', '$species', '$living', '$lastInsertedId')";
        $req = $bdd->prepare($query);
        $req->execute();
    }
    public function updateAnimal(AnimalModel $animal)
    {
        $bdd = $this->bdd;
        $query = "UPDATE animals SET name = :name, species = :species, living = :living, image_id = :image_id WHERE animal_id = :animal_id";
        $req = $bdd->prepare($query);
        $req->bindValue(':name', $animal->getName());
        $req->bindValue(':species', $animal->getSpecies());
        $req->bindValue(':living', $animal->getLiving());
        $req->bindValue(':image_id', $animal->getImageId());
        $req->bindValue(':animal_id', $animal->getId());
        $req->execute();
    }

    public function deleteAnimal(int $animal_id){
        $bdd = $this->bdd;
        $query = "DELETE FROM animals WHERE animal_id = :animal_id";
        $req = $bdd->prepare($query);
        $req->bindValue(':animal_id', $animal_id);
        $image_id = $this->getAnimalById($animal_id)->getImageId();
        $this->deleteImg($image_id);
        $req->execute();
    }

    // Services
    public function getServices(): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM services";
        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $service = new ServiceModel();
            $service->setId($row['service_id']);
            $service->setName($row['name']);
            $service->setSchedule($row['schedule']);
            $service->setContactInfo($row['contact_info']);
            $service->setImageId($row['image_id']);
            $service->setImage($this->getImg($row['image_id']));
            $service->setDescription($row['description']);

            $services[] = $service; // array of objects (ServiceModel)
        }
        return $services;
    }

    // Comments
    public function getComments(): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM comments";
        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $comment = new CommentModel();
            $comment->setId($row['comment_id']);
            $comment->setNickname($row['nickname']);
            $comment->setContent($row['content']);
            $comment->setVisibility($row['visibility']);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function insertComment(string $nickname, string $message)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO comments (nickname, content,visibility) VALUES ('$nickname', '$message' , 1)";
        $req = $bdd->prepare($query);
        $req->execute();
    }


    //Img

    public function getImg($image_id):ImageModel
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM images WHERE image_id = :image_id";
        $req = $bdd->prepare($query);
        $req->bindValue(':image_id', $image_id);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $image = new ImageModel();
            $image->setId($row['image_id']);
            $image->setData($row['image_data']);
        }
        return $image;
    }

    public function addImage($image_name, $image_data):int
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO `images`(`image_name`, image_data) VALUES (:image_name,:image_data)";
        $req = $bdd->prepare($query);
        $req->bindValue(':image_name', $image_name);
        $req->bindValue(':image_data', $image_data);
        $req->execute();

        $query = "SELECT LAST_INSERT_ID() FROM images";
        $req = $bdd->prepare($query);
        $req->execute();
        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $result = $row['LAST_INSERT_ID()'];
        }
        return $result;
    }

    public function deleteImg(int $image_id){
        $bdd = $this->bdd;
        $query = "DELETE FROM images WHERE image_id = :image_id";
        $req = $bdd->prepare($query);
        $req->bindValue(':image_id', $image_id);
        $req->execute();
    }
}