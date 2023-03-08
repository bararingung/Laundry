const form = document.querySelector('.form')

function subTotal(harga, barang, biaya) {
    const total = harga * barang + biaya
    return total
}

function cekDiskon(subtotal){
    let diskon

    if (subtotal >= 250000){
        diskon = 25;
    } else if (subtotal >= 200000){
        diskon = 20
    }else if (subtotal >= 150000){
        diskon = 15
    }else if (subtotal >= 100000){
        diskon = 10
    }else if (subtotal >= 50000){
        diskon = 5
    } else {
        diskon = 0
    }
    return diskon
}
  
function cekPajak(){
    let pajak

    pajak = 11

    return pajak
  }

  function nilaiDiskon(harga, diskon){
    return harga * (diskon / 100 )
  }

  function nilaiPajak(harga, pajak){
    return harga / (pajak / 100 )
  }

  function jumlahPembayaran(total, nilaiDis, nilaiPaj){
    return total - nilaiDis + nilaiPaj
  }

  form.addEventListener('submit', (event)=> {
    let harga = document.getElementById('harga').value;

  })

