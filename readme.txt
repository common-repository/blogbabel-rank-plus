=== BlogBabel Rank Plus ===
Contributors: pixel8383
Tags: statistics, stats, rank, blogbabel, antipixel, liquida
Donate link: http://www.dreamsworld.it/emanuele/la-mia-wishlist/
Requires at least: 1.5
Tested up to: 2.9.2
Stable tag: 1.8.4

Questo plugin permette di aggiungere il rank di BlogBabel sul proprio blog.

== Description ==

Questo plugin permette di aggiungere il rank di BlogBabel sul proprio blog.

== Installation ==

Se hai gia' installato un plugin, allora installare questo sara' facilissimo.

1. Estrai il file. Copia il file `blogbabelrankplus.php` nella cartella `/wp-content/plugins/`
2. Attiva il plugin attraverso il menu 'Plugins' di Wordpress
3. Inserisci nel template la seguente stringa: `<?php if(function_exists(wp_blogbabelrankplus)) { wp_blogbabelrankplus("slug-url"); } ?>`
4. Sostituisci in "slug-url" il nome assegnato da BlogBabel nell'url delle statistiche per il tuo blog.

Ad esempio: `<?php if(function_exists(wp_blogbabelrankplus)) { wp_blogbabelrankplus("time-is-what-you-make-of-it"); } ?>`

**Hai finito**. Goditi il tuo rank visualizzato sul tuo blog. :-)

---

Se invece del banner vuoi usare la *forma testuale*, esegui le istruzioni qui di seguito:

1. Inserisci nel template del blog il seguente codice: `<?php wp_blogbabelrankplus_text("slug-url"); ?>`
2. Sostituisci a "slug-url" il nome assegnato da BlogBabel nell'url delle statistiche per il tuo blog.

Ad esempio: `<?php wp_blogbabelrankplus_text("time-is-what-you-make-of-it"); ?>`

Il risultato sara' un numero con un link verso la pagina del tuo rank su BlogBabel.

----

Tramite CSS e' possibile personalizzare graficamente il testo, usando le seguenti classi: "babel-green" e "babel-red".

Ad esempio, per visualizzare il risultato verde o rosso in base all'incremento o decremento di posizioni su BlogBabel, bastera' aggiungere il seguente codice al foglio di stile:

*.babel-green { color: #00FF00; }*
*.babel-red { color: #ff0000; }*
---

== Frequently Asked Questions ==

= Wordpress mi segnala una nuova versione, come aggiorno il plugin? =

Semplicemente scarica la nuova versione e sostituisci il file `blogbabelrankplus.php` della cartella `wp-content/plugins/` con quello nuovo.

= L'immagine non si vede, da cosa puo' dipendere? =

Assicurati che l'immagine `bbrplus.png` sia presente nella cartella `wp-content/uploads/` della tua installazione di Wordpress.
Se cosi' non fosse, assicurati di dare sufficienti permessi in scrittura per quella cartella. Un `chmode 644` dovrebbe bastare.

= Ogni quanto si aggiorna l'immagine? =

L'immagine si aggiornera' ogni 18 ore circa (ma comunque massimo una volta al giorno). Se vuoi forzare l'aggiornamento dell'immagine, ti basta cancellare il file `bbrplus.png` presente nella cartella `wp-content/uploads/` della tua installazione di Wordpress.

= Il plugin salva dei dati sul database di Wordpress? =

Uno dei punti di forza di `BlogBabel Rank Plus` e' la sua estrema leggerezza che fa si che non abbia alcun bisogno del database. Questo permette una maggiore velocita' in caricamento ed un minore appesantimento del lavoro per il tuo server.

= Come disinstallo il plugin? =
Se proprio non ti piace il plugin e vuoi disinstallarlo ed eliminare ogni sua traccia, esegui queste semplici operazioni:

1. Disattiva il plugin `BlogBabel Rank Plus` attraverso il menu 'Plugins' di Wordpress
2. Elimina il codice PHP inserito nel template.
3. Elimina il file `bbrplus.png` presente nella cartella `wp-content/uploads/` della tua installazione di Wordpress.
4. Elimina il file `blogbabelrankplus.php` presente nella cartella `/wp-content/plugins/`.

== Credits ==

Ringrazio Undolog (http://www.undolog.org) per l'idea, Matteo (http://www.ilmatte81.eu/) per il paziente betatesting e neon (http://io.facciocose.it/) per i consigli sul codice.

Per rispetto del mio e del loro lavoro, vi sarei grato se i credits rimanessero intatti ;-)

Emanuele (aka P|xeL)

http://www.dreamsworld.it/emanuele/