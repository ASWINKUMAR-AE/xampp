const product = [
    {
        id: 0,
        image: 'img/a.jpg',
        title: 'Apple',
        price: 	500,
    },
    {
        id: 1,
        image: 'img/b.jpg',
        title: 'Banana',
        price: 50,
    },
    {
        id: 2,
        image: 'img/m.jpg',
        title: 'Pomegranate',
        price: 200,
    },
    {
        id: 3,
        image: 'img/o.jpg',
        title: 'Orange',
        price: 200,
    },
    {
        id: 4,
        image: 'img/mo.jpg',
        title: 'Mango',
        price: 100,
    },
    {
        id: 5,
        image: 'img/pa.jpg',
        title: 'Papaya',
        price: 100,
    },
    {
        id: 6,
        image: 'img/wt.jpg',
        title: 'Watermelon',
        price: 300,
    },
    {
        id: 7,
        image: 'img/ga.jpg',
        title: 'Greenapple',
        price: 200,
    },
    {
        id: 8,
        image: 'img/gr.jpg',
        title: 'Grapes',
        price: 300,
    },
    {
        id: 9,
        image: 'img/p.jpg',
        title: 'Pineapple',
        price: 100,
    },
       {
        id: 10,
        image: 'img/g.jpg',
        title: 'Guava',
        price: 120,
    },
    {
        id: 11,
        image: 'img/p.jpg',
        title: 'Jackfruit',
        price: 200,
    },
     {
        id: 12,
        image: 'img/c.jpg',
        title: 'Cherries',
        price: 220,
    },
     {
        id: 13,
        image: 'img/r.jpg',
        title: 'Raspberries',
        price: 170,
    },
     {
        id: 14,
        image: 'img/s.jpg',
        title: 'strawberry',
        price: 240,
    }
];
const categories = [...new Set(product.map((item)=>
    {return item}))]
    let i=0;
document.getElementById('root').innerHTML = categories.map((item)=>
{
    var {image, title, price} = item;
    return(
        `<div class='box'>
            <div class='img-box fruite-item d-flex img-fluid rounded'>
                <img class='images fruite-img d-flex rounded' src=${image} ></img>
            </div>
        <div class='bottom'>
        <p>${title}</p>
        <h4>Rs. ${price}</h4>`+
        "<button onclick='addtocart("+(i++)+")'>Add to cart &nbsp; <img class='ad' src='img/buy.png' width='30' height='30'></button>"+
        `</div>
        </div>`
    )
}).join('')

var cart =[];

function addtocart(a){
    cart.push({...categories[a]});
    displaycart();
}
function delElement(a){
    cart.splice(a, 1);
    displaycart();
}

function displaycart(){
    let j = 0, total=0;
    document.getElementById("count").innerHTML=cart.length;
    if(cart.length==0){
        document.getElementById('cartItem').innerHTML = "Your cart is empty";
        document.getElementById("total").innerHTML = "$ "+0+".00";
    }
    else{
        document.getElementById("cartItem").innerHTML = cart.map((items)=>
        {
            var {image, title, price} = items;
            total=total+price;
            document.getElementById("total").innerHTML = "$ "+total+"";
            return(
                `<div class='cart-item' >
                <div class='row-img'>
                    <img class='rowimg' src=${image}  style='border-radius:20px; ' >
                </div>
                
                <p style='font-size:12px; word-wrap: break-word !important;'>${title}</p>
                <h2 style='font-size: 10px;word-wrap: break-word !important;'>$ ${price}</h2>`+
                "<i class='fa-solid fa-trash' onclick='delElement("+ (j++) +")'><img src='img/del.png' width='30' style='background:rgb(43, 42, 42); padding:5px; border-radius:50%;'  height='30'></i></div>"
            );
        }).join('');
    }

    
}








