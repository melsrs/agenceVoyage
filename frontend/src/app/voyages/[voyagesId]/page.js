"use client";

import { useEffect, useState } from "react";
import Navbar from "@/components/navbar/navbar.js";
import VoyageDetail from "@/components/voyageDetail/VoyageDetail";

export default function Voyages(props) {
  const [loading, setLoading] = useState(true); 
  const [error, setError] = useState(false); 
  const [voyages, setVoyages] = useState(null); 

  useEffect(() => {
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