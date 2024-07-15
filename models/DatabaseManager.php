<?php

class DatabaseManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=ecf', 'admin', 'N0pl4c3t0h1d3?');
    }

    /////////////////////////////////////////////////////////////////////////// Users ////////////////////////////////
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

    /////////////////////////////////////////////////////////////////////////// Livings ////////////////////////////////
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
            $living->setImage($this->getImg($row['image_name']));
            $livings[] = $living; // array of objects (LivingModel)
        }
        return $livings;
    }

    /////////////////////////////////////////////////////////////////////////// Animals ////////////////////////////////
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
            $animal->setImage($this->getImg($row['image_name']));
            $animals[] = $animal; // Array of all animals in database
        }
        return $animals;
    }

    public function getAnimalByName(string $name)
    {
        $bdd = $this->bdd;
        $query = "SELECT * from animals WHERE name = :name";
        $req = $bdd->prepare($query);
        $req->bindValue(':name',$name);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)){
            $animal = new AnimalModel();
            $animal->setId($row['animal_id']);
            $animal->setName($row['name']);
            $animal->setSpecies($row['species']);
            $animal->setLiving($row['living']);
            $animal->setImageName($this->getImg($row['image_name']));
        }
        return $animal;
    }

    public function getAnimalsByLiving($living_name): array
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM animals WHERE living = :living_name";
        $req = $bdd->prepare($query);
        $req->bindValue(':living_name', $living_name);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $animal = new AnimalModel();
            $animal->setId($row['animal_id']);
            $animal->setName($row['name']);
            $animal->setSpecies($row['species']);
            $animal->setLiving($row['living']);
            $animal->setImage($this->getImg($row['image_name']));
            $animals[] = $animal; // Array of animals in a certain living
        }
        return $animals;
    }

    public function addAnimal($name, $species, $living, $image_name)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO animals(name, species, living, image_name) VALUES ('$name', '$species', '$living', '$image_name')";
        $req = $bdd->prepare($query);
        $req->execute();
    }

    public function deleteAnimal(string $name){
        $bdd = $this->bdd;
        $query = "DELETE FROM animals WHERE name = :name";
        $req = $bdd->prepare($query);
        $req->bindValue(':name', $name);
        $image_name = $this->getAnimalByName($name)->getImage();
        $this->deleteImg($image_name);
        $req->execute();

    }

    /////////////////////////////////////////////////////////////////////////// Services ////////////////////////////////
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
            $service->setImage($this->getImg($row['image_name']));
            $service->setDescription($row['description']);

            $services[] = $service; // array of objects (ServiceModel)
        }
        return $services;
    }

    /////////////////////////////////////////////////////////////////////////// Comments ////////////////////////////////
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


    /////////////////////////////////////////////////////////////////////////// Img ////////////////////////////////
    public function getImg($img_name)
    {
        $bdd = $this->bdd;
        $query = "SELECT * FROM images WHERE image_name = :img_name";
        $req = $bdd->prepare($query);
        $req->bindValue(':img_name', $img_name);
        $req->execute();

        while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
            $image_data = $row['image_data'];
        }
        return $image_data;
    }

    public function addImage($image_name, $image_data)
    {
        $bdd = $this->bdd;
        $query = "INSERT INTO `images`(`image_name`, image_data) VALUES (:image_name,:image_data)";
        $req = $bdd->prepare($query);
        $req->bindValue(':image_name', $image_name);
        $req->bindValue(':image_data', $image_data);
        $req->execute();
    }

    public function deleteImg(string $image_name){
        $bdd = $this->bdd;
        $query = "DELETE FROM images WHERE image_name = :image_name";
        $req = $bdd->prepare($query);
        $req->bindValue(':image_name', $image_name);
        $req->execute();
    }
}