"use client";

import Navbar from "@/components/navbar/navbar.js";
import VoyageList from "@/components/voyageList/voyageList.js"

export default function Home() {
  return (
    <main>
      <Navbar />
      <VoyageList />
    </main>
  );
}