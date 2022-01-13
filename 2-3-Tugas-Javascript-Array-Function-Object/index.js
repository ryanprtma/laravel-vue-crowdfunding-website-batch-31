//soal 1
console.log("//soal 1")

var daftarHewan = ["2. Komodo", "5. Buaya", "3. Cicak", "4. Ular", "1. Tokek"];

function urut_angka(array){
    const new_array = array.sort()
    new_array.forEach(function(item){
        console.log(item);
    })
}

urut_angka(daftarHewan);

//soal 2
console.log("//soal 2")

var data = {name : "John" , age : 30 , address : "Jalan Pelesiran" , hobby : "Gaming" }

function introduce(data){
    var obj = data 
    var name=obj.name
    var age=obj.age
    var address=obj.address
    var hobby=obj.hobby
    
    return "Nama saya " + name + ", umur saya" + age + " tahun, alamat saya di" + address + ", dan saya punya hobby yaitu " + hobby
}

var perkenalan = introduce(data)
console.log(perkenalan);

//soal 3
console.log("//soal 3")

function hitung_huruf_vokal(string){
    var count = 0
    var hurufVokal = ["a", "i", "u", "e", "o"]
    var newString = string.toLowerCase()
    for(i=0;i<=newString.length-1;i++){
    for(j=0; j<=hurufVokal.length-1; j++){
    if(newString[i]==hurufVokal[j]){
    count++
    }
    }
    }
    return count
    }
    
    var hitung_1= hitung_huruf_vokal("Muhammad")
    var hitung_2= hitung_huruf_vokal("Iqbal")
    console.log(hitung_1, hitung_2)


//soal 4
console.log("//soal 4")

function hitung(n){
    hasil=n-2+n
    console.log(hasil)
}

hitung(0) //-2
hitung(1) //0
hitung(2) //2
hitung(3) //4
hitung(5) //8