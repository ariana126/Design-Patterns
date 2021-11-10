## Command pattern

The` Command pattern` encapsulates actions as objects. Command objects allow for loosely coupled systems by separating the objects that issue a request from the objects that actually process the request. These requests are called events and the code that processes the requests are called event handlers.

```javascript

function add(x, y) { return x + y; }
function sub(x, y) { return x - y; }
function mul(x, y) { return x * y; }
function div(x, y) { return x / y; }

const Command = function (execute, undo, value) {
    this.execute = execute;
    this.undo = undo;
    this.value = value;
}

const AddCommand = function (value) {
    return new Command(add, sub, value);
};

const SubCommand = function (value) {
    return new Command(sub, add, value);
};

const MulCommand = function (value) {
    return new Command(mul, div, value);
};

const DivCommand = function (value) {
    return new Command(div, mul, value);
};

const Calculator = function () {
    const current = 0;
    const commands = [];

    function action(command) {
        const name = command.execute.toString().substr(9, 3);
        return name.charAt(0).toUpperCase() + name.slice(1);
    }

    return {
        execute: function (command) {
            current = command.execute(current, command.value);
            commands.push(command);
            console.log(action(command) + ": " + command.value);
        },

        undo: function () {
            const command = commands.pop();
            current = command.undo(current, command.value);
            console.log("Undo " + action(command) + ": " + command.value);
        },

        getCurrentValue: function () {
            return current;
        }
    }
}

function run() {

    const calculator = new Calculator();

    // issue commands

    calculator.execute(new AddCommand(100));
    calculator.execute(new SubCommand(24));
    calculator.execute(new MulCommand(6));
    calculator.execute(new DivCommand(2));

    // reverse last two commands

    calculator.undo();
    calculator.undo();

    console.log("\nValue: " + calculator.getCurrentValue());
}

```