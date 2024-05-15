"use client"

import { useEffect, useState } from "react";
import Navbar from "@/components/navbar/navbar.js";
import VoyageDetail from "@/components/voyageDetail/VoyageDetail";

export default function Voyages() {
    // Initialisation des états pour gérer le chargement, les erreurs, et les données reçues.
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); 
  const [voyages, setVoyages] = useState(null); 

  useEffect(() => {
    // Déclenchement de la récupération des données de personnages au montage du composant.
    try {
      fetch("https://127.0.0.1:8000/api/voyage" + params.voyage.id)
        .then((response) => response.json()) // Transformation de la réponse en JSON.
        .then((data) => {
          setLoading(false); 
          setVoyages(data); 
        });
    } catch (error) {
      setError(true);
      setLoading(false); 
    }
  }, []); 


  return (
    <main>
      <Navbar />
      {loading && !error && <div>Données en cours de chargement !</div>}
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