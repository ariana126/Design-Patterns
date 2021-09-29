## Façade

The `Façade` pattern provides an interface which shields clients from complex functionality in one or more subsystems. It is a simple pattern that may seem trivial but it is powerful and extremely useful. It is often present in systems that are built around a multi-layer architecture.

```javascript

const Mortgage = function (name) {
    this.name = name;
}

Mortgage.prototype = {

    applyFor: function (amount) {
        // access multiple subsystems...
        let result = "approved";
        if (!new Bank().verify(this.name, amount)) {
            result = "denied";
        } else if (!new Credit().get(this.name)) {
            result = "denied";
        } else if (!new Background().check(this.name)) {
            result = "denied";
        }
        return this.name + " has been " + result +
            " for a " + amount + " mortgage";
    }
}

const Bank = function () {
    this.verify = function (name, amount) {
        // complex logic ...
        return true;
    }
}

const Credit = function () {
    this.get = function (name) {
        // complex logic ...
        return true;
    }
}

const Background = function () {
    this.check = function (name) {
        // complex logic ...
        return true;
    }
}

function run() {
    const mortgage = new Mortgage("Joan Templeton");
    const result = mortgage.applyFor("$100,000");

    console.log(result);
}

```

> Note:  The content of this file is from the [dofactory](https://www.dofactory.com/javascript/design-patterns/facade) site and only I have written this [example](Request/Request.js).
 

## Another Example:

We have `custom hook` and `hooks` in the React js or Svelte, `custom hooks` and `hooks` are an example of this pattern that hides complexity.

Example of hook in react:
```javascript
import {React} from 'react';

const Test = () => {
    const [state, setState] = useState(0);
    return <button onClck={setState(state + 1)}>{state}</button>     
}
```

The example of custom hook in react
```javascript
import {React} from 'react';

const useCustomHook = (name) => {

    const sayName = () => {
        console.log('name');
    }
    
    const sayHello = () => {
        console.log("Hello ", name);
    }
    
    return [sayName, sayHello];
}

const TestCustomHook = () => {
    const [sayName, sayHello] = useCustomHook('Sara');
    
    sayName(); // Sara
    sayHello(); // Hello Sara
    
    return <div/>;
}
```
