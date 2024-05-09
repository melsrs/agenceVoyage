"use client";

import { useEffect, useState } from "react";
import Navbar from "@/components/navbar/navbar.js";
import VoyageList from "@/components/voyageList/VoyageList.js";

export default function Voyages() {
    // Initialisation des états pour gérer le chargement, les erreurs, et les données reçues.
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); // État pour capturer une éventuelle erreur lors du fetch.
  const [data, setData] = useState(null); // Stockage des données reçues du fetch.

  useEffect(() => {
    // Déclenchement de la récupération des données de personnages au montage du composant.
    try {
      fetch("https://127.0.0.1:8000/api/voyages")
        .then((response) => response.json()) // Transformation de la réponse en JSON.
        .then((data) => {
          setLoading(false); // Arrêt de l'indicateur de chargement après la réception des données.
          setData(data.results); // Enregistrement des données reçues dans l'état 'data'.
        });
    } catch (error) {
      setError(true); // Enregistrement de l'erreur dans l'état 'error'.
      setLoading(false); // Arrêt de l'indicateur de chargement en cas d'erreur.
    }
  }, []); // Le tableau vide indique que cet effet ne s'exécute qu'au montage.

  return (
    <main>
      <Navbar />
      {loading && !error && <div>Données en cours de chargement !</div>}
      {!loading && !error && data && <VoyageList voayages={data} />}
      {!loading && error && <div>Une erreur est survenue</div>}
    </main>
  );
}