class Animal {

    name;
    specie;
    living;
    food;
    foodQuantity;
    feedingDate;
    date;
    health;
    remark;

    constructor(name,specie,living,food,foodQuantity,feedingDate,date,health,remark) {
        this.name = name;
        this.specie = specie;
        this.living = living;
        this.health = health;
        this.remark = remark;
        this.food = food;
        this.foodQuantity = foodQuantity;
        this.feedingDate = feedingDate;
        this.date = date;
    }

    get name() {
        return this.name;
    }
    get specie() {
        return this.specie;
    }
    get living() {
        return this.living;
    }

    set name(value) {
        this.name = value;
    }

    set specie(value) {
        this.specie = value;
    }
    set living(value) {
        this.living = value;
    }
    get health() {
        return this._health;
    }

    set health(value) {
        this._health = value;
    }

    get remark() {
        return this.remark;
    }

    set remark(value) {
        this.remark = value;
    }
    get food() {
        return this.food;
    }

    set food(value) {
        this.food = value;
    }

    get foodQuantity() {
        return this.foodQuantity;
    }

    set foodQuantity(value) {
        this.foodQuantity = value;
    }

    get feedingDate() {
        return this.feedingDate;
    }

    set feedingDate(value) {
        this.feedingDate = value;
    }

    get date() {
        return this.date;
    }

    set date(value) {
        this.date = value;
    }

}