import { deleteOrders } from "@/app/database/delete_modals";
import { getOneOrder } from "@/app/database/get_modals";
import { NextResponse } from "next/server";

export const GET = async (req) => {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  try {
    const { orders, error } = await getOneOrder(id);
    if (error) throw new Error(error);

    return NextResponse.json({ orders });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};
export const DELETE = async (req) => {
  const { searchParams } = new URL(req.url);
  const id = searchParams.get("id");
  try {
    const { orders, error } = await deleteOrders(id);
    if (error) throw new Error(error);
    return NextResponse.json({ orders });
  } catch (error) {
    return NextResponse.json({ error: error.message });
  }
};
