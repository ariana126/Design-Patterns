const Node = function (name, title, initialOptions) {
    this.id = Date.now() * Math.random() * 1000000;
    this.name = name;
    this.title = title;
    this.attributes = initialOptions;
    this.children = [];
}

Node.prototype = {
    addChild: function (child) {
        this.children.push(child);
    },
    removeChild: function (id) {
        for (let i = this.children.length; i--;) {
            if (this.children[i].id === id) {
                return this.children.splice(i, 1);
            }
        }
    },
    setAttributes: function (attributes) {
        this.attributes = {...this.attributes, ...attributes};
    },
    getChildren: function () {
        return this.children;
    },
    getNodeInfo: function () {
        return {
            id: this.id,
            name: this.name,
            title: this.title,
            attributes: this.attributes,
            children: this.children
        }
    }
}

export function run() {

    const priceWithShippingWeight = new Node('price-with-shipping-weight', 'Price with shipping weight', {
        weight: {unit: null, weight: null, ignore: null},
        value: {unit: null, value: null},
    }), conditionsOnWeight = new Node('conditions-on-weight', 'Conditions on weight', {
        range: null,
        weight: null,
        unit: null
    }), conditionsOnValue = new Node('conditions-on-value', 'Conditions on value', {
        range: null,
        value: null,
        unit: null
    }), conditionsOnSize = new Node('conditions-on-size', 'Conditions on size', {
        size: null,
        title: null
    });

    // Set base condition attributes
    priceWithShippingWeight.setAttributes({
        weight: {unit: 'KG', weight: 25, ignore: 1},
        value: {unit: 'IRT', value: 2000}
    });

    // Set conditions on weight attributes
    conditionsOnWeight.setAttributes({
        range: 2000,
        weight: 10,
        unit: 'KG'
    });

    // Set conditions on value attributes
    conditionsOnValue.setAttributes({
        range: 5,
        value: 2000,
        unit: 'IRT'
    });

    // Set conditions on size attributes
    conditionsOnSize.setAttributes({
        size: 1,
        title: 'A4'
    })

    conditionsOnValue.addChild(conditionsOnWeight);

    priceWithShippingWeight.addChild(conditionsOnWeight);
    priceWithShippingWeight.addChild(conditionsOnValue);
    priceWithShippingWeight.addChild(conditionsOnSize);

    console.log(priceWithShippingWeight.getNodeInfo());

}