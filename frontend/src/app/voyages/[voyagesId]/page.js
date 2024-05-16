"use client";

import { useEffect, useState } from "react";
import Navbar from "@/components/navbar/navbar.js";
import VoyageDetail from "@/components/voyageDetail/VoyageDetail";

export default function Voyages(props) {
  // Initialisation des états pour gérer le chargement, les erreurs, et les données reçues.
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
  const [voyages, setVoyages] = useState(null); // Stockage des données reçues du fetch.
console.log(props);
  useEffect(() => {
    // Déclaration d'une fonction asynchrone pour récupérer les données.
    const fetchVoyages = async () => {
      try {
        const response = await fetch("https://127.0.0.1:8000/api/voyage/" + props.params.voyagesId);
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        const data = await response.json();
        setVoyages(data);
        setLoading(false);
      } catch (error) {
        setError(true);
        setLoading(false);
      }
    };

    // Appel de la fonction asynchrone.
    fetchVoyages();
  }, [props.params.voyagesId]);

  return (
    <main>
      <Navbar />
      {loading && !error && <div>Données en cours de chargement</div>}
      {!loading && !error && voyages && (
        <VoyageDetail
          nom={voyages.nom}
          image={voyages.image}
          prix={voyages.prix}
          datedepart={voyages.datedepart}
          datearrivee={voyages.datearrivee}
          description={voyages.description}
          moyentransport={voyages.moyentransport}
          pays={voyages.Pays.nom}
          categorie={voyages.Categorie.nom}
        />
      )}
      {!loading && error && <div>Une erreur est survenue.</div>}
    </main>
  );
}