"use client"

import "./footer.css";
import Link from "next/link";

export default function Footer(){
    const brand = "Brand";

    return (
      <div className="footer">
        <Link href="/" className="logo">
          {brand}
        </Link>
      </div>
    );
}