const maxRedigit = angka => {
    let stringAngka = angka.toString()
    let panjangArray = stringAngka.length
    let arrayAngka = []
    let count = 0

    for(var i = 0 ;i<=stringAngka.length-1;i++){
        arrayAngka.push(parseInt(stringAngka[i]))
        for(var j = 0 ;j<=stringAngka.length-1;j++){
            if(stringAngka[i]==stringAngka[j]){
                count++
            }
        }
    }

    if(count/panjangArray==panjangArray || stringAngka[0]=="-"){
        console.log(null)
        return null
    }
    
        let angkaLama = arrayAngka.sort().join("")
        let angkaBaru = parseInt(arrayAngka.sort().reverse().join(""))
        if(angkaLama[0]==0  && angkaLama<angkaBaru){
            console.log(null)
            return null
        }else{
            console.log(angkaBaru)
            return angkaBaru
        }
    
}

maxRedigit(-1)



