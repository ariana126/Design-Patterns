## Decorator

The `Decorator pattern` extends (decorates) an object’s behavior dynamically. The ability to add new behavior at runtime is accomplished by a Decorator object which ‘wraps itself’ around the original object. Multiple decorators can add or override functionality to the original object.

```javascript
const User = function (name) {
    this.name = name;

    this.say = function () {
        console.log("User: " + this.name);
    };
}

const DecoratedUser = function (user, street, city) {
    this.user = user;
    this.name = user.name;  // ensures interface stays the same
    this.street = street;
    this.city = city;

    this.say = function () {
        console.log("Decorated User: " + this.name + ", " +
            this.street + ", " + this.city);
    };
}

function run() {

    const user = new User("Kelly");
    user.say();

    const decorated = new DecoratedUser(user, "Broadway", "New York");
    decorated.say();
}

```

> Note:  The content of this file is from the [dofactory](https://www.dofactory.com/javascript/design-patterns/decorator) site and only I have written this [example](Pizza/Pizza.js).