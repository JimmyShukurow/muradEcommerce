require('./bootstrap');

import { App, plugin } from '@inertiajs/inertia-vue'
import Vue from 'vue'
import vuetify from "./vuetify";
import VueI18n from 'vue-i18n'


Vue.use(plugin)
Vue.use(VueI18n)
const messages = {
    en: {
        "cancel": 'Cancel',
        "OK": 'OK',
        "confirm": "Confirm",
        "Are you sure you want to delete this record?": "Are you sure you want to delete this record?",
        "no Image":"no Image",
        "name":"Name",
        "Language":"Language",
        "Dashboard": "Dashboard",
        "Menus": "Menus",
        "Slides": "Slides",
        "Users": "Users",
        "User": "User",
        "Products": "Products",
        "Roles": "Roles",
        "Role": "Role",
        "Add new Product": "Add new Product",
        "Add new Role": "Add new Role",
        "Add new Menu": "Add new Menu",
        "Add new Brand": "Add new Brand",
        "Add new Model": "Add new Model",
        "Product was deleted": "Product was deleted",
        "Product was updated": "Product was updated",
        "Product was saved" : "Product was saved",
        "Settings": "Settings",
        "Update": "Update",
        "Drop files here...": "Drop files here...",
        "category": " Category",
        "Delete": "Delete",
        "Brands" : "Brands",
        "Brand": "Brand",
        "Models": "Models",
        "Model": "Model",
        "New Menu": "New Menu",
        "New Brand": "New Brand",
        "New Model": "New Model",
        "New Product": "New Product",
        "New Role": "New Role",
        "Save": "Save",
        "Back": "Back",
        "Parent": "Parent",
        "Icon": "Icon",
        "Select a category": "Select a category",
        "TopSlider": "TopSlider",
        "FirstSlider": "FirstSlider",
        "SecondSlider":"SecondSlider",
        "ThirdSlider": "ThirdSlider",
        "Detail": "Detail",
        "Email": "Email",
        "Phone": "Phone",
        "Address": "Address",
        "Price": "Price",
        "Quantity": "Quantity",
        "Image": "Image",
        "Description": "Description",
        "Size": "Size",
        "Home": "Home",
        "Fast Delivery": "Fast Delivery",
        "Favorites": "Favorites",
        "My Basket": "My Basket",
        "Profile": "Profile",
        "Sells": "Sells",
        "Orders": "Orders",
        "Total price": "Total price",
        "Created at": "Created at",
        "Register": "Register",
        "Login": "Login",
        "Discover": "Discover",
        "What to search...": "What to search...",
        "Discover Our New Services!": "Discover Our New Services!",
        "Add To Basket": "Add To Basket",
        "size": "size",
        "Sum:": "Sum:", 
        "Pay": "Pay",
        "Pay All": "Pay All",
        "Pay From Wallet": "Pay From Wallet",
        "In the Wallet:" : "In the wallet:",
        "Not enough money": "Not enough money!",
        "password": "Password",
        "User Profile": "User Profile",
        "First name": "First name",
        "Last name": "Last name",
        "Phone Number": "Phone Number",
        "Address": "Address",
        "Already has profile": "Already has profile",
        "indicates required field": "indicates required field"
      },
    tkm: {
        "cancel": 'Yok',
        "OK": 'Bass',
        "confirm": "Tassykla",
        "Are you sure you want to delete this record?": "Sen Uwerynmy?",
        "no Image":"Surat Yok",
        "name":"Ady",
        "Language":"Dil",
        "Dashboard": "Dolandyryş paneli",
        "Menus": "Kategoriýalar",
        "Slides": "Slaýdlar",
        "Users": "Ulanyjylar",
        "User": "Ulanyjy",
        "Products": "Önümler",
        "Roles": "Rollar",
        "Role": "Roly",
        "Add new Product": "Täze önüm goş",
        "Add new Role": "Täze rol goş",
        "Add new Menu": "Täze menýu goş",
        "Add new Brand": "Täze marka goş",
        "Add new Model": "Täze model goşuň",
        "Product was deleted": "Önüm Yoklandy",
        "Product was updated": "Önüm Täzelendi",
        "Product was saved" : "Täze  Önüm Goşuldy",
        "Settings": "Sazlamalar",
        "Update": "Täzele",
        "Drop files here...": "Suratlary şu yere taşla...",
        "category": " Kategoriyasy",
        "Delete": "ýokla",
        "Brands" : "Markalar",
        "Brand": "Marka",
        "Models": "Modeller",
        "Model": "Modeli",
        "New Menu": "Täze menýu",
        "New Brand": "Täze marka",
        "New Model": "Täze model",
        "New Product": "Täze önüm",
        "New Role": "Täze Rol",
        "Save": "Sakla",
        "Back": "Yza",
        "Parent": "Degişli kategoriýa",
        "Icon": "Nyşan",
        "Select a category": "Kategoriýa saýla",
        "TopSlider": "Baş slaýder",
        "FirstSlider": "Ilkinji slaýder",
        "SecondSlider":"Ikinji slaýder",
        "ThirdSlider": "Üçünji slaýder",
        "Detail": "Görkez",
        "Email": "E-poçta",
        "Phone": "Telefony",
        "Address": "Adresi",
        "Price": "Bahasy",
        "Quantity": "Mukdary",
        "Image": "Suraty",
        "Description": "Önüm hakda",
        "Size": "Razmeri",
        "Home": "Baş sahypa",
        "Fast Delivery": "Göni ýolla ",
        "Favorites": "Saýlamalar",
        "My Basket": "Sepedim",
        "Profile": "Hasabym",
        "Sells": "Satyşlar",
        "Orders": "Zakazlar",
        "Total price": "Jemi Baha",
        "Created at": "Alnan wagty",
        "Register": "Agza bol",
        "Login": "Giriş",
        "Discover": "Gözläň",
        "What to search...": "Näme gözlemeli...",
        "Discover Our New Services!": "Täze hyzmatlarymyza göz gezdiriň!",
        "Add To Basket": "Sebede okla",
        "size": "razmer",
        "Sum:": "Jemi:", 
        "Pay": "Töle",
        "Pay All": "Tölegi geçir",
        "Pay From Wallet": "Gapjykdan töle",
        "In the Wallet:" : "Gapjykda:",
        "Not enough money": "Gapjykda pul az!",
        "password": "Parol",
        "User Profile": "Ulanyjy bilgileri",
        "First name": "Ady",
        "Last name": "Familiýasy",
        "Phone Number": "Telefon nomeri",
        "Adress": "Salgysy",
        "Already has profile": "Hasabyňyz barmy?",
        "indicates required field": "hökman doldurmaly ýerler"

      },
    ru: {
        "cancel": 'Oтменить',
        "OK": 'Ok',
        "confirm": "подтвердить",
        "Are you sure you want to delete this record?": "Вы уверены, что хотите удалить эту запись?",
        "no Image":"нет изображения",
        "name":"Hазвание",
        "Language":"Язык",
        "Dashboard": "Контрольная Панель",
        "Menus": "Категории",
        "Slides": "Слайды",
        "Users": "Пользователи",
        "User": "Пользователь",
        "Products": "Товары",
        "Roles": "Роли",
        "Role": "Роль",
        "Add new Product": "Täze önüm goş",
        "Add new Role": "Taze rol goş",
        "Product was deleted": "Önüm Yoklandy",
        "Product was updated": "Önüm Tazelendi",
        "Product was saved" : "Taze  Önüm Goşuldy",
        "Add new Brand": "Add new Brand",
        "Add new Model": "Add new Model",
        "Settings": "Настройки",
        "Update": "Обновить",
        "Drop files here...": "Перетащите сюда файлы...",
        "category": " Категории",
        "Delete": "Удалить",
        "Brands" : "Бренды",
        "Brand": "Бренд",
        "Models": "Модели",
        "Model": "Модель",
        "New Menu": "New Menu",
        "New Brand": "New Brand",
        "New Model": "New Model",
        "New Product": "New Product",
        "New Role": "New Role",
        "Save": "Save",
        "Back": "Back",
        "Parent": "Parent",
        "Icon": "Nyşan",
        "Select a category": "Select a category",
        "TopSlider": "TopSlider",
        "FirstSlider": "FirstSlider",
        "SecondSlider":"SecondSlider",
        "ThirdSlider": "ThirdSlider",
        "Detail": "Detail",
        "Email": "Эл. адрес",
        "Phone": "Phone",
        "Address": "Address",
        "Price": "Price",
        "Quantity": "Quantity",
        "Image": "Image",
        "Description": "Description",
        "Size": "Size",
        "Home": "Home",
        "Fast Delivery": "Fast Delivery",
        "Favorites": "Избранное",
        "My Basket": "Моя корзина",
        "Profile": "Profile",
        "Sells": "Продажи",
        "Orders": "Заказы",
        "Total price": "Итоговая цена",
        "Created at": "Дата покупки",
        "Register": "Pегистрироваться",
        "Login": "Bход",
        "Discover": "Bce",
        "What to search...": "Что искать...",
        "Discover Our New Services!": "Откройте для себя наши новые услуги!",
        "Add To Basket": "Добавить в корзину",
        "size": "размер",
        "Sum:": "Сумма:", 
        "Pay": "Oплатить",
        "Pay All": "Оплатить все",
        "Pay From Wallet": "Оплатить из кошелька",
        "In the Wallet:" : "В кошельке:",
        "Not enough money": "Недостаточно денег!",
        "password": "Пароль",
        "User Profile": "Профиль пользователя",
        "First name": "Имя",
        "Last name": "Фамилия",
        "Phone Number": "Номер телефона",
        "Adress": "Адрес",
        "Already has profile": "Уже есть профиль",
        "indicates required field": "указывает обязательное поле"

      }
  }
  const i18n = new VueI18n({
    locale: 'en',
    messages,
  })

const el = document.getElementById('app')
export const bus = new Vue();


new Vue({
    vuetify,
    i18n: i18n,
    render: h => h(App, {
        props: {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: name => require(`./Pages/${name}`).default,
        },
    }),
}).$mount(el)
