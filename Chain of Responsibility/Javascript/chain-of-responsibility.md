The `Chain of Responsibility` pattern provides a chain of loosely coupled objects one of which can satisfy a request. This pattern is essentially a linear search for an object that can handle a particular request.

```javascript

const Request = function (amount) {
    this.amount = amount;
    console.log("Requested: $" + amount + "\n");
}

Request.prototype = {
    get: function (bill) {
        var count = Math.floor(this.amount / bill);
        this.amount -= count * bill;
        console.log("Dispense " + count + " $" + bill + " bills");
        return this;
    }
}

function run() {
    var request = new Request(378);

    request.get(100).get(50).get(20).get(10).get(5).get(1);
}

```

```javascript
// Requested: $378
// Dispense 3 $100 bills
// Dispense 1 $50 bills
// Dispense 1 $20 bills
// Dispense 0 $10 bills
// Dispense 1 $5 bills
// Dispense 3 $1 bills
```