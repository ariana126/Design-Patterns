const RAM = function (amount) {
    this.amount = amount;
}

RAM.prototype = {
    get: function (amount) {
        console.log("your request is ", amount);

        if (this.amount < amount) {
            return console.error("Overflow!!!");
        }

        this.amount = this.amount - amount;

        console.log("Inventory is:", this.amount);

        return this;
    }
}

(function run() {
    const request = new RAM(8000);

    request.get(2000).get(500).get(600).get(500);
}())