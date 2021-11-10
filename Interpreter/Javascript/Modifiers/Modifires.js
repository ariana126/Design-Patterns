const Context = function(input) {
    this.input = input;
    this.output = [];
}

Context.prototype = {
    startWith: function (str) {
        return this.input.substr(0, str.length) === str;
    }
}

const ref = { 
    '.-':     'a',
    '-...':   'b',
    '-.-.':   'c',
    '-..':    'd',
    '.':      'e',
    '..-.':   'f',
    '--.':    'g',
    '....':   'h',
    '..':     'i',
    '.---':   'j',
    '-.-':    'k',
    '.-..':   'l',
    '--':     'm',
    '-.':     'n',
    '---':    'o',
    '.--.':   'p',
    '--.-':   'q',
    '.-.':    'r',
    '...':    's',
    '-':      't',
    '..-':    'u',
    '...-':   'v',
    '.--':    'w',
    '-..-':   'x',
    '-.--':   'y',
    '--..':   'z',
    '.----':  '1',
    '..---':  '2',
    '...--':  '3',
    '....-':  '4',
    '.....':  '5',
    '-....':  '6',
    '--...':  '7',
    '---..':  '8',
    '----.':  '9',
    '-----':  '0',
  };

const Expression =function (name) {
    this.name = name;
}

Expression.prototype = {
    interpret: function (context) {
        context.output = context.input.split("  ").map(
            letter => letter.split(" ").map(
                word => ref[word]
            ).join("")
        )
    }
}

(function run() {
    const input = '.... . .-.. .-.. ---  .-- --.- .-. .-.. -..',
        context = new Context(input);

    const res = new Expression("My first sentence");

        res.interpret(context);

        console.log("Sentence is:", res.output);
}())
