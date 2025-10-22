package com.example.despliegue_api_rest.entity;

import java.time.LocalDate;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity

public class Pet {
    
    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String name;
    private LocalDate born;
    private String chip;
    private String category;
    private Boolean adopt;

    public Long getId() {
        return id;
    }
    public void setId(Long id) {
        this.id = id;
    }
    public String getName() {
        return name;
    }
    public void setName(String name) {
        this.name = name;
    }
    public LocalDate getBorn() {
        return born;
    }
    public void setBorn(LocalDate born) {
        this.born = born;
    }
    public String getChip() {
        return chip;
    }
    public void setChip(String chip) {
        this.chip = chip;
    }
    public String getCategory() {
        return category;
    }
    public void setCategory(String category) {
        this.category = category;
    }
    public Boolean getAdopt() {
        return adopt;
    }
    public void setAdopt(Boolean adopt){
        this.adopt = adopt;
    }
}
