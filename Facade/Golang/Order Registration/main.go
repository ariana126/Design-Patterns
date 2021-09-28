package main

import (
	"fmt"
	"math/rand"
)

func main() {
	registerOrder("Order-1")
	registerOrder("Order-2")
	registerOrder("Order-3")
}

func registerOrder(ID string) {
	order := &order{
		ID: ID,
	}
	order.Price = calculatePriceFor(order)

	registerOrderInAmazon(order)
}

// Amazon Package
type order struct {
	ID    string
	Price int
}

func calculatePriceFor(order *order) int {
	return rand.Intn(8) + 3
}

func registerOrderInAmazon(order *order) {
	fmt.Printf("Order with Id: %s and price: %d registered.\n", order.ID, order.Price)
}