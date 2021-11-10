function applicantRegistration(request) {
    let response;

    fetch(request).then( res=> response = res);

    return response;
}

function daneshBonyanCompanyInformation(request) {
    let response;

    fetch(request).then( res=> response = res);

    return response;
}

function degrees(request) {
    let response;

    fetch(request).then( res=> response = res);

    return response;
}

const Command = function (execute, value) {
    this.execute = execute;
    this.value = value;
}

const ApplicantCommand = function (value) {
    return new Command(applicantRegistration, value);
};

const CompanyCommand = function (value) {
    return new Command(daneshBonyanCompanyInformation, value);
};

const DegreeCommand = function (value) {
    return new Command(degrees, value);
};

const Registration = function () {
    let current = '';
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

        getCurrentState: function () {
            return current;
        }
    }
}

function run() {

    const soldier = new Registration();

    // issue commands

    soldier.execute(new ApplicantCommand({name: 'mohsen'}));
    soldier.execute(new CompanyCommand({name: 'podro', id: '12345'}));
    soldier.execute(new DegreeCommand([{name: 'masters degree', date: '2021-08-01'}]));

    console.log("\nValue: " + soldier.getCurrentState());
}
