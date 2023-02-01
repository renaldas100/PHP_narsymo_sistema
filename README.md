# PHP naršymo sistema

Naudotos technologijos: PHP + BOOTSTRAP

1. Užduotis

Sukurta katalogų ir failų išvedimui skirtą internetinė sistema.

Užkrovus pirmą puslapį atvaizduojamas tam tikro katalogo turinys (jame esantys katalogai ir failai).
Paspaudus ant katalogo atsidaro (tame pačiame puslapyje) to katalogo turinys (katalogai ir failai).
Šalia katalogų atvaizduotas ir bendras to katalogo dydis (rekursiškai susumuoti visi failai kurie yra tame kataloge)

Paspaudus ant failo atliekami tokie veiksmai:

jei failas .txt, .php, naujame lange atsidaro text area kurioje galima koreguoti failą ir jį išsaugoti.


Visame failų sąraše taip pat yra mygtukai - redaguoti, ištrinti  (mygtukas redaguoti atlieka tą patį ką ir paspaudus ant failo pavadinimo), paspaudus mygtuką ištrinti failas ištrinamas.

Po failų sąrašu atvaizduota forma skirta sukurti naują katalogą (katalogas sukuriamas esamame kataloge).

Padaryta taip, kad failų sąraše atitinkamiem failam būtų įdėtos skirtingos piktogramos.

Puslapio viršuje yra paieškos laukelis kuriame įvedus failo pavadinimą rekursinių funkcijų pagalba yra atliekama failų paieška serveryje.

Sukurtas prisijungimas skirtas failų naršyklei. Failus matyti ir parsisiųsti gali tik vartotojai tinkamai prisijungę prie sistemos.

2. Užduotis

Parašyta rekursinė funkcija dviejų natūraliųjų skaičių didžiausiam bendram dalikliui
(dbd) rasti, remiantis tokiomis dbd savybėmis:
dbd(a, b) = a, jei a = b;
dbd(a, b) = dbd(a, b – a), jei a < b;
dbd(a, b) = dbd(a – b, b), jei a >b.

## Printscreen
![narsymo_sist_large](https://user-images.githubusercontent.com/117721797/216113941-091d2a28-ca61-4885-9c39-f650f38b34ec.png)
