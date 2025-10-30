package com.example.despliegue_api_rest.controller;

import java.util.List;
import java.util.Optional;

import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.bind.annotation.RequestMethod; // IMPORT NECESARIO

import com.example.despliegue_api_rest.entity.Pet;
import com.example.despliegue_api_rest.repository.PetRepository;

@RestController
@RequestMapping("/pet")
@CrossOrigin(
    origins = "${app.cors.allowed-origins}",
    allowedHeaders = "*",
    methods = {RequestMethod.GET, RequestMethod.PUT, RequestMethod.OPTIONS}
)
public class Controllerpets {

    private PetRepository petRepository;

    public Controllerpets(PetRepository petRepository){
        this.petRepository = petRepository;
    }

    @GetMapping("/list")
    public List<Pet> ListadoPets(){
        return petRepository.findAll();
    }

    @PutMapping("/adopt/{id}")
    public Pet adoptPet(@PathVariable Long id) {
        Optional<Pet> petOpt = petRepository.findById(id);
        if (petOpt.isPresent()) {
            Pet pet = petOpt.get();
            pet.setAdopt(true);
            return petRepository.save(pet);
        } else {
            throw new RuntimeException("Pet not found");
        }
    }
}
