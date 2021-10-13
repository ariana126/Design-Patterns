let entities = {
    female: [
        {id: 1,name: 'Aiden', age: 20},
        {id: 2,name: 'Iona', age: 30},
        {id: 3,name: 'Connie', age: 27},
        {id: 4,name: 'Lachlan', age: 26},
    ],
    male: [
        {id: 1,name: 'Xander', age: 21},
        {id: 2,name: 'Josh', age: 35},
        {id: 3,name: 'Morgan', age: 25},
        {id: 4,name: 'Albert', age: 26},
    ]
}

function Safieh() {
    this.getNewEmployee = function (sex, ageFrom, ageTo) {
        return new Jabinja().request('Wubba lubba dub dub', sex);
    }
}

function CoupleFinderProxy() {
    const hr = new Safieh();

    function isExist(sex, ageFrom, ageTo) {
        const list = [];

        if (!entities[sex].length) return false;

        for (let i = entities[sex]; i--;) {
            if (entities[sex][i].age <= ageTo &&  entities[sex].age >= ageFrom) {
                list.push(entities[sex][i]);
            }
        }

        return list;
    }

    function choose(id, sex) {
        entities[sex].filter(person => person.id !== id);

        return console.log('Congratulation\n' + 'Do not forget the sweets :)');
    }

    return {
        request: function (sex, ageFrom, ageTo) {
            const InventoryList = isExist(sex, ageFrom, ageTo);

            if (InventoryList) {
                return InventoryList;
            }

            return hr.getNewEmployee(sex, ageFrom, ageTo);
        },
        choose
    }
}

function run() {
    const coupleFinder = new CoupleFinderProxy();

    const list = coupleFinder.request('female', 19, 25);

    coupleFinder.choose(list[0].id, 'female');
}