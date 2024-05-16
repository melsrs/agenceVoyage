"use client"

import { useEffect, useState } from "react";
import Navbar from "@/components/navbar/navbar.js";
import VoyageList from "@/components/voyageList/VoyageList.js";
import Footer from "@/components/footer/Footer";

export default function Voyages() {
    // Initialisation des états pour gérer le chargement, les erreurs, et les données reçues.
  const [loading, setLoading] = useState(true); // État de chargement des données.
  const [error, setError] = useState(false); 
  const [voyages, setVoyages] = useState(null); 

  useEffect(() => {
    try {
      fetch("https://127.0.0.1:8000/api/voyages")
        .then((response) => response.json()) 
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
      {loading && !error && <div>Données en cours de chargement</div>}
      {!loading && !error && voyages && <VoyageList voyages={voyages} />}
      {!loading && error && <div>Une erreur est survenue.</div>}
      <Footer />
    </main>
  );
}