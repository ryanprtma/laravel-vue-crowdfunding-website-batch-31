//soal 1
console.log("//soal 1")

let panjang = 4
let lebar = 2
const luasPersegiPanjang = (panjang, lebar) => {
    return panjang*lebar
}

const kelilingPersegiPanjang = (panjang, lebar) => {
    return 2*panjang+2*lebar
}

console.log(`Luas : ${luasPersegiPanjang(panjang, lebar)}, Keliling : ${kelilingPersegiPanjang(panjang, lebar)}`)

//soal 2
console.log("//soal 2")

const newFunction = (firstName, lastName) => {
    var firstName = firstName
    var lastName = lastName
    var fullName = ()=>{
        console.log(firstName + " " + lastName)
    }
    return {
        firstName, 
        lastName,
        fullName,
    }
}

//Driver Code 
newFunction("William", "Imoh").fullName() 

//soal 3
console.log("//soal 3")

const newObject = {
    firstName: "Muhammad",
    lastName: "Iqbal Mubarok",
    address: "Jalan Ranamanyar",
    hobby: "playing football",
}

const {firstName, lastName, address, hobby} = newObject

// Driver code
console.log(firstName, lastName, address, hobby)

//soal 4
console.log("//soal 4")

const west = ["Will", "Chris", "Sam", "Holly"]
const east = ["Gill", "Brian", "Noel", "Maggie"]
const combined = [...west, ...east]
//Driver Code
console.log(combined)

//soal 5
console.log("//soal 5")

const planet = "earth" 
const view = "glass" 
var before = 'Lorem ' + view + 'dolor sit amet, ' + 'consectetur adipiscing elit,' + planet 
var after = `Lorem  ${view } dolor sit amet, consectetur adipiscing elit, ${planet} `

console.log(after)

