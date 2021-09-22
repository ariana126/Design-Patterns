const Pizza = function (type) {
    this.type = type;
    this.basePrice = type === 'american' ? 40000 : 50000;
}

Pizza.prototype = {
    getPrice: function() {
        return this.basePrice;
    },
    getType: function() {
        return this.type;
    }
}


// American

const DecoratedMix = function (basePizza) {
    this.basePizza = basePizza;
    this.price = 20000;
    this.content = ['American pizza dough', 'grilled chicken fillet', 'mint, Beyonce sauce', 'chicken ham', 'bell peppers', 'mushrooms', 'cheese', 'olives and tomatoes'];
}

DecoratedMix.prototype = {
    getContent: function () {
        console.log("The Mix pizza content is: \n");
        this.content.forEach(n => console.log(n + '\n'));
    },
    getPrice: function () {
        return this.price + this.basePizza.getPrice();
    }
}

// Italian
const DecoratedChano = function (basePizza) {
    this.basePizza = basePizza;
    this.price = 30000;
    this.content = ['Italian thin dough', 'steak', 'mushrooms', 'olives', 'special garlic sauce', 'special cheese'];
}

DecoratedChano.prototype = {
    getContent: function () {
        console.log("The Chano pizza content is: \n");
        this.content.forEach(n => console.log(n + '\n'));
    },
    getPrice: function () {
        return this.price + this.basePizza.getPrice();
    }
}

function run() {
    const pizza = new Pizza('american');

    const decorated = new DecoratedMix(pizza);

    decorated.getContent();
    console.log("Price: ", decorated.getPrice());
}