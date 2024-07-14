<?php

class DatabaseManager {

    private $bdd;

    public function __construct(){
        $this->bdd = new PDO('mysql:host=localhost;dbname=ecf', 'admin', 'N0pl4c3t0h1d3?');
    }

    public function getLivings():array{
        $bdd = $this->bdd;
        $query = "SELECT * FROM livings";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)){

            $living = new LivingModel();
            $living->setId($row['living_id']);
            $living->setName($row['name']);
            $living->setDescription($row['description']);
            $living->setComment($row['comment_living']);
            $livings[] = $living; // array of objects (LivingModel)
        }
        return $livings;
    }

    public function getServices():array{
        $bdd = $this->bdd;
        $query = "SELECT * FROM services";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)){

            $service = new ServiceModel();
            $service->setId($row['service_id']);
            $service->setName($row['name']);
            $service->setDescription($row['description']);

            $services[] = $service; // array of objects (LivingModel)
        }
        return $services;
    }
}