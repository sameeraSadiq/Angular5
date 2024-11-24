import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-item',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './item.component.html',
  styleUrls: ['./item.component.css']
})
export class ItemComponent {
  newItem = { name: '', description: '' }; // Object to hold new item data
  items: { name: string; description: string }[] = []; // Array to store items

  // Method to add a new item
  addItem() {
    if (this.newItem.name.trim()) { // Check if the name is not empty
      this.items.push({ ...this.newItem }); // Add the new item to the items array
      this.newItem = { name: '', description: '' }; // Reset the form fields
    } else {
      console.error('Item name is required'); // Log an error if name is empty
    }
  }

  // Method to delete an item by index
  deleteItem(index: number) {
    this.items.splice(index, 1); // Remove the item from the array
  }
}