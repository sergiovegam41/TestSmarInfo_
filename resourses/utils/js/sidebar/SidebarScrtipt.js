
import { HOST_NAME, MENU_LIST } from '/resourses/utils/js/ConfigApp.js';
import { Sidebar } from './SidebarTemplate.js';
// import Sortable from 'sortablejs';
// import Sortable from 'https://cdn.jsdelivr.net/npm/sortablejs@latest/Sortable.min.js';
import 'https://cdn.jsdelivr.net/npm/sortablejs@1.14.0/Sortable.min.js';


    document.addEventListener("DOMContentLoaded", ready);
  
    function findMenuByName(value){

    }

    function ready() {

      
   


        //deff web componet
        window.customElements.define('side-bar',Sidebar);

        //deff events to toggle sidebar
        addEventForToggle();

        //This line add funtion search moduls of aplications
        AddSearchFunction();



        let lista = document.getElementById('menu-links');

        console.log("Aui")
        console.log(lista)
        // console.log(Sortable)

        Sortable.create(lista, {
          animation: 150,
          chosenClass: "seleccionado",
          // ghostClass: "fantasma"
          dragClass: "drag",
        
          onEnd: () => {
            console.log('Se inserto un elemento');
          },
          group: "lista-personas",
          store: {
            // Guardamos el orden de la lista
            set: (sortable) => {
              const orden = sortable.toArray();
              localStorage.setItem(sortable.options.group.name, orden.join('|'));
            },
        
            // Obtenemos el orden de la lista
            get: (sortable) => {
              const orden = localStorage.getItem(sortable.options.group.name);
              return orden ? orden.split('|') : [];
            }
          }
        });
      
         
    }

    function AddSearchFunction(){

        document.querySelector('#search-menu').addEventListener("change", function(event){
          console.log(event.target.value)

          let search = MENU_LIST.filter(item => item.name.includes((event.target.value.toLowerCase()).replace(/^\w/, (c) => c.toUpperCase())) );
          console.log(search);

          voidMenu();

          fillMenubySearch(search);
          

        } );

        
    }

    function fillMenubySearch(search){

      let FINAL_MENU_LIST_SEARCH = [];
      search.forEach(element => {
        FINAL_MENU_LIST_SEARCH += `
  
        <li class="nav-link">
            <a href="${element.url}">
                <ion-icon class ='icon' name="${element.icon}"></ion-icon>
                <span class="text nav-text">${element.name}</span>
            </a>
        </li>
    
        `
      });

      let list = document.getElementById('menu-links');
      list.innerHTML = search.length == 0? "<p style='font-size: 15px; '>" + selectRamdomExcuse()+"</p>" :FINAL_MENU_LIST_SEARCH

    }


    function selectRamdomExcuse(){
      var numExcuse = Math.floor((Math.random() * 10) + 1); 
      var numFace = Math.floor((Math.random() * 10) + 1);

     let listExcuses = [
        "No pudimos encontrar lo que buscas",
        "Lo que buscas no lo encontraras aqui",
        "No enconramos nada..",
        "Sigue intentando",
        "Intenta ser mas franco",
        "Al parecer no esta eso que buscas",
        "Aqui no esta",
        "Nada...",
        "Vacio... como tu corazon",
        "Dice ella que no esta",
      ];

     let listFaces = [
        '^_^',
        'O.O',
        '*^____^*',
        '`(*>﹏<*)′',
        '^_-',
        '(‾◡◝)',
        ':|',
        '(*^_^*)',
        '＞﹏＜',
        '(^///^)',
      ];

      return listExcuses[numExcuse-1] + " <br> " + listFaces[numFace-1]
    }

    function voidMenu(){
      let ul = document.getElementById('menu-links');

      while (ul.firstChild){
        ul.removeChild(ul.firstChild);
      };
      
    }


    function addEventForToggle() {
      
      const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box");
    
    
      body.querySelector('.home').style = 'opacity: 0;transform: translateX(250px); transition: .5s;';
      body.querySelector('.home').style = 'opacity: 1;transform: translateX(250px); transition: .5s;';
      toggle.addEventListener("click" , () =>{
        sidebar.classList.toggle("close");
    
        if(sidebar.classList[1] != null){
          body.querySelector('.home').style = 'background: red !important; transition: .5s;';
          body.querySelector('.home').style = 'transform: translateX(90px); transition: .5s;';
    
        }else{
          body.querySelector('.home').style = 'transform: translateX(250px); transition: .5s;';
    
        }
    
      })
    
      searchBtn.addEventListener("click" , () =>{
        sidebar.classList.remove("close");
    
        if(sidebar.classList[1] != null){
          body.querySelector('.home').style = 'transform: translateX(90px); transition: .5s;';
    
        }else{
          body.querySelector('.home').style = 'transform: translateX(250px); transition: .5s;';
    
        }
      })

    
    }
  