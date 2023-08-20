<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\agent;
use Carbon\Carbon;
use App\Models\operation;
use Illuminate\Http\Request;

class Analytics extends Controller
{
  
  public function dashboardAnalytics($name)
{
  // Get the total number of registered users (Agents) from the "Agent" table
  $totalUsers = Agent::count();

  // Calculate the percentage of new agents in the current month
  $currentMonth = Carbon::now()->format('m'); // Get the current month as a two-digit number (e.g., '07')
  $newAgentsThisMonth = Agent::whereMonth('created_at', $currentMonth)->count();
  $totalAgentsThisMonth = Agent::count(); // Get the total number of agents created this month
  $percentNewAgents = ($totalAgentsThisMonth > 0) ? ($newAgentsThisMonth / $totalAgentsThisMonth) * 100 : 0;

  // Get the total number of books from the "Documents" table
  $totalBooks = Document::count();

  // Get the number of overdue books
  $overdueBooks = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
      ->where('operation.type', 'Borrow')
      ->whereDate('operation.Returning-day', '<', Carbon::now())
      ->count();

  // Calculate the percentage of overdue books in the total borrowed books
  $percentOverdueBooks = ($totalBooks > 0) ? ($overdueBooks / $totalBooks) * 100 : 0;

  // Get the total number of borrowed books
  $totalBorrowedBooks = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
      ->where('operation.type', 'Borrow')
      ->count();

  // Calculate the percentage of borrowed books in the total books
  $percentBorrowedBooks = ($totalBooks > 0) ? ($totalBorrowedBooks / $totalBooks) * 100 : 0;

  // Get the top 6 borrowed books
  $topBooks = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
      ->select('document.*', operation::raw('COUNT(operation.id_operation) as borrow_count'))
      ->where('operation.type', 'Borrow')
      ->groupBy('document.id_document')
      ->orderByDesc('borrow_count')
      ->limit(6)
      ->get();

  // Get all categories from the "Documents" table
  $categories = Document::pluck('categorie')->unique();

  // Get the number of books borrowed per category
  $booksBorrowedByCategory = [];
  foreach ($categories as $category) {
      $booksBorrowed = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
          ->where('operation.type', 'Borrow')
          ->where('document.categorie', $category)
          ->count();

      $booksBorrowedByCategory[$category] = $booksBorrowed;
  }

  // Calculate the total number of borrowed books
  $totalBorrowedBooks = array_sum($booksBorrowedByCategory);

  // Calculate the percentage of borrowed books by category
  $percentBorrowedByCategory = [];
  foreach ($booksBorrowedByCategory as $category => $count) {
      $percentBorrowed = ($totalBorrowedBooks > 0) ? ($count / $totalBorrowedBooks) * 100 : 0;
      $percentBorrowedByCategory[$category] = round($percentBorrowed, 2);
  }

  // Get the years for the book borrowing graph
  $years = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
      ->select(operation::raw('YEAR(operation.date_saisie) as year'))
      ->where('operation.type', 'Borrow')
      ->groupBy('year')
      ->get()
      ->pluck('year')
      ->toArray(); // Convert the collection to an array

  // Get the number of books borrowed per year for the graph
  $booksBorrowedPerYear = Document::leftJoin('operation', 'document.id_document', '=', 'operation.id_document')
      ->select(operation::raw('YEAR(operation.date_saisie) as year'), operation::raw('COUNT(operation.id_operation) as total_books'))
      ->where('operation.type', 'Borrow')
      ->groupBy('year')
      ->get()
      ->pluck('total_books')
      ->toArray(); // Convert the collection to an array
      $user = session('user');

      if (!$user) {
          // Redirect to an error page
          return redirect()->route('error')->with('error', 'Access denied.');
      }
      

  return view('content.dashboard.dashboards-analytics', compact('totalUsers','name', 'percentNewAgents', 'totalBooks', 'overdueBooks', 'percentOverdueBooks', 'totalBorrowedBooks', 'percentBorrowedBooks', 'booksBorrowedPerYear', 'years', 'topBooks', 'categories', 'booksBorrowedByCategory', 'percentBorrowedByCategory'));

}
}
