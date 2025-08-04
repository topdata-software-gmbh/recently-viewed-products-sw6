---
title: FAQ (Häufig gestellte Fragen)
---

**F: Der Slider für kürzlich angesehene Produkte erscheint auf keiner Seite. Warum?**

A: Dafür gibt es mehrere mögliche Gründe:
1.  Der Kunde hat noch keine Produkte angesehen. Der Slider erscheint erst, nachdem mindestens ein Produkt besucht wurde.
2.  Das aktuell angezeigte Produkt wird auf der Produktdetailseite aus dem Slider ausgeschlossen, um Duplikate zu vermeiden.
3.  Die Funktion ist möglicherweise in der Plugin-Konfiguration deaktiviert. Prüfen Sie, ob **Auf Produktdetailseite anzeigen** oder **Auto Auf Cms-Seite anzeigen** aktiviert ist.
4.  Die angesehenen Produkte sind nicht mehr aktiv oder im aktuellen Sales Channel nicht sichtbar. Das Plugin filtert nicht verfügbare Produkte automatisch heraus.

**F: Wie verfolgt das Plugin Produkte für Kunden, die nicht angemeldet sind?**

A: Bei Gastbenutzern werden die kürzlich angesehenen Produkte mit dem aktuellen Session-Token (`sw-context-token`) verknüpft. Das bedeutet, dass der Verlauf während des Besuchs der Website erhalten bleibt.

**F: Was passiert mit dem Verlauf eines Gastes, wenn er sich anmeldet?**

A: Wenn sich ein Gast mit einem Ansichtsverlauf anmeldet, wird sein Session-Token auf den Token seines Kundenkontos aktualisiert. Das Plugin stellt sicher, dass der Produktverlauf nahtlos übernommen wird, sodass die Liste der kürzlich angesehenen Artikel nicht verloren geht.

**F: Kann ich auf verschiedenen Seiten unterschiedliche Slider-Stile haben?**

A: Ja. Die Einstellungen in der Plugin-Konfiguration sind nur Standardwerte. Wenn Sie den Block **Schieberegler für kürzlich gesehene Produkte** im Editor der Erlebniswelten verwenden, können Sie jede visuelle Einstellung (wie Titel, Anzeigemodus, Rahmen usw.) für diesen spezifischen Slider überschreiben. Dies gibt Ihnen die volle Kontrolle über sein Aussehen auf jeder einzelnen Seite.

**F: Verlangsamt dieses Plugin meine Website?**

A: Das Plugin wurde unter Berücksichtigung der Performance entwickelt. Der Inhalt des Sliders wird über eine asynchrone AJAX-Anfrage geladen, nachdem die Hauptseite geladen wurde. Dies stellt sicher, dass das Rendern der Seite nicht blockiert wird und ist mit den Full-Page-Caching-Mechanismen von Shopware kompatibel.
